<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

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
}
