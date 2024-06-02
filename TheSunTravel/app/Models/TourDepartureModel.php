<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDepartureModel extends Model
{
    use HasFactory;
    protected $table = 'tour_departures';

    public function tour()
    {
        return $this->belongsTo(TourModel::class, 'tour_id', 'id');
    }
    public function bookings()
    {
        return $this->hasMany(BookingModel::class, 'tour_departure_id', 'id');
    }
}
