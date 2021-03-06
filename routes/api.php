<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

//Models
use \App\Event;
use \App\User;
use \App\Ticket;
use \App\EventCategory;

//Others
use Vinkla\Hashids\Facades\Hashids;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/events/categories', function () {
    return EventCategory::orderBy('name')->get();
});


Route::group(['prefix' => 'users/register'], function () {
    Route::get('teste', [\App\Http\Controllers\Auth\RegisterController::class, 'teste']);
    Route::post('', [\App\Http\Controllers\Auth\RegisterController::class, 'create']);
});

Route::post('login', 'Auth\LoginController@login');

Route::middleware('auth:api')->group(function () {

    Route::post('/user/logout', function(Request $request) {
        $request->user()->removeToken();
        if(!$request->user()->api_token) {
            return response('User Logouted', 200);
        }
    });

    Route::post('/user/edit', function(Request $request) {
        $user = $request->user();
        $user->fill($request->all());
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return response('User updated', 200);
    });


    Route::get('/user/events', function(Request $request) {
        $user = $request->user();
        return $user->events()->with('eventCategory')->get();
    });

    Route::post('/user/events/edit', function(Request $request) {
        $event = Event::findOrFail($request->id);
        $event->fill($request->all());
        $event->save();

        return $event;

    });


Route::post('/user/events/create', function(Request $request) {

    $event = new Event;
    $event = $event->fill($request->all());

    //rellations
    $event->user_id = $request->user()->id;
    $event->event_category_id = $request->event_category_id;

    $event->save();

    return $event;
});



    Route::get('/user/tickets', function(Request $request) {
        return $request->user()->tickets()->with('event')->get();
    });
    Route::post('/user/tickets/comprar', function(Request $request) {
        $event = Event::findOrFail($request->event_id);
        if(!$event->hasAvailableTickets()) {
            return $event;
        }

        $ticket_id = rand(1, 10000000);
        $ticket_hashid = strtoupper(Hashids::encode($ticket_id));

        $ticket = Ticket::create([
            'id' =>     $ticket_id,
            'hashid' => $ticket_hashid,
            'event_id' => $event->id,
            'user_id' => $request->user()->id,
        ]);

        $event->decrementAvailableTickets();

        return $ticket;
    });
});

Route::get('/events', function(Request $request) {
    return Event::where('tickets_available', "!=", 0)->with('eventCategory')->get();
});
