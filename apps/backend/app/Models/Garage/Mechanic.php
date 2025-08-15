<?php

namespace App\Models\Garage;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{


    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function clients()
    {
        return $this->hasManyThrough(User::class, Car::class, 'id', 'id');
    }
}
