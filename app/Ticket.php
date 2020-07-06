<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Ticket extends Model
{
    protected $fillable = [
        'id',
        'hashid',
        'event_id',
        'user_id',
    ];
    
    /** 
     * ===============================================================
     * RELS
     * RELS
     * RELS
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function event() {
        return $this->belongsTo(Event::class);
    }
    
}
