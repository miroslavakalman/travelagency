<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'text', 'user_name', 'tour_id'
    ];

    public function tour()
    {
        return $this->belongsTo(related: Tour::class);
    }
}
