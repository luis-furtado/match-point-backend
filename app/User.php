<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    protected $appends = [
        'total_tickets',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'instagram_account',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** 
     * ===============================================================
     * RELATIONSHIP
     * RELATIONSHIP
     * RELATIONSHIP
     */
    public function events() {
        return $this->hasMany('App\Event');
    }
    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    /** 
     * ===============================================================
     * METDHS
     * METDHS
     * METDHS
     */
    public function generateToken() {
        $this->api_token = Str::random(60);
        $this->save();
        
        return $this->api_token;
    }

    /** 
     * ===============================================================
     * ATTRIBUTES
     * ATTRIBUTES
     * ATTRIBUTES
     */
    public function getTotalTicketsAttribute() {
        return $this->tickets()->count();
    }
    
    
}
