<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
   public $table = 'activities';


    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }


}
