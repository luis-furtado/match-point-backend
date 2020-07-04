<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    /** 
     * ===============================================================
     * RELATIONSHIP
     * RELATIONSHIP
     * RELATIONSHIP
     */
    public function users() {
        return $this->belongsTo('App\User');
    }
    
}
