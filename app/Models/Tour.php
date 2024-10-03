<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',           // название тура
        'description',    // описание тура
        'type',
        'cost',
        'duration',
        'continent',
        'country',
        'language',
        'accommodation_type',
        'image_path',
        'max_people',     // новое поле
        'start_date',     // новое поле
        'end_date',       // новое поле
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
