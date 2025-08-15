<?php

namespace App\Models\Garage;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    protected $fillable = [
        'model',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'mechanic_id',
        'user_id',
    ];

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function plate()
    {
        return $this->hasOne(Plate::class);
    }
}
