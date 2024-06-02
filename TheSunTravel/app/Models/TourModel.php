<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourModel extends Model
{
    use HasFactory;
    protected $table = 'Tours';

    public function tourDepartures()
    {
        return $this->hasMany(TourDepartureModel::class, 'tour_id', 'id');
    }
    public function bookings()
    {
        return $this->hasMany(BookingModel::class, 'tour_id', 'id');
    }
}
