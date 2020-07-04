<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $guarded = [];

    /** 
     * ===============================================================
     * RELLS
     * RELLS
     * RELLS
     */
    public function events() {
        return $this->hasMany(Event::class);
    }
    
}
