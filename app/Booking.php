<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $table = 'bookings';
    protected $fillable = ['activity_id', 'number_of_users', 'booking_price', 'start_date'];


    public function activity()
    {
        return $this->belongsTo('App\Activity');
    }
}
