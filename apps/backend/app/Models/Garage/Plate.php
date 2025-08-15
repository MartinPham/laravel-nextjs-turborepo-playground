<?php

namespace App\Models\Garage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plate extends Model
{
    protected $table = 'car_plates';


    protected $hidden = [
        'created_at',
        'updated_at',
        'car_id',
        'laravel_through_key'
    ];

    protected $fillable = [
        'number',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
