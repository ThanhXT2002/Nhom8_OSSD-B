<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;
    protected $table = "bookings";

    public function tour()
    {
        return $this->belongsTo(TourModel::class, 'tour_id', 'id');
    }

    public function tourDeparture()
    {
        return $this->belongsTo(TourDepartureModel::class, 'tour_departure_id', 'id');
    }
}
