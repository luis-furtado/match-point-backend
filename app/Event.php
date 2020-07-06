<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    // protected $fillable = ['*'];

    /** 
     * ===============================================================
     * RELATIONSHIP
     * RELATIONSHIP
     * RELATIONSHIP
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function eventCategory() {
        return $this->belongsTo(EventCategory::class);
    }
    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    /** 
     * ===============================================================
     * METHODS
     * METHODS
     * METHODS
     */
    public function hasAvailableTickets() {
        return (bool) $this->tickets_available;
    }

    public function decrementAvailableTickets() {
        $this->tickets_available--;
        $this->save();
    }
}
