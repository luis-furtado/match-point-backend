<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Ticket extends Model
{
    public static function boot() {

        parent::boot();
    
        static::creating(function ($ticket) {
            $rand_number = rand();

            $ticket->id = $rand_number;
            $ticket->hashid = strtoupper(Hashids::encode($rand_number));

            $ticket->save();
        });
    }
    /** 
     * ===============================================================
     * RELS
     * RELS
     * RELS
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
