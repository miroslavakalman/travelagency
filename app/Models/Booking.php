<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tour_id', 'number_of_people', 'start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
    public function cancel()
{
    $this->delete();
}

public function updateBooking($data)
{
    $this->update($data);
}

}
