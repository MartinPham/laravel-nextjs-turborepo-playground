<?php

namespace Database\Seeders;

use App\Models\Garage\Mechanic;
use App\Models\Garage\Plate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // Create users
        $usersData = [
            ['role' => User::ROLE_ADMIN, 'name' => 'Admin', 'email' => 'admin@mph.am'],
            ['role' => User::ROLE_USER, 'name' => 'User', 'email' => 'user@mph.am'],
            ['role' => User::ROLE_USER, 'name' => 'John Doe', 'email' => 'john@example.com'],
            ['role' => User::ROLE_USER, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
            ['role' => User::ROLE_USER, 'name' => 'Robert Johnson', 'email' => 'robert@example.com'],
            ['role' => User::ROLE_USER, 'name' => 'Emily Davis', 'email' => 'emily@example.com'],
            ['role' => User::ROLE_USER, 'name' => 'Michael Wilson', 'email' => 'michael@example.com'],
            ['role' => User::ROLE_USER, 'name' => 'Sarah Brown', 'email' => 'sarah@example.com'],
            ['role' => User::ROLE_USER, 'name' => 'David Miller', 'email' => 'david@example.com'],
            ['role' => User::ROLE_USER, 'name' => 'Lisa Garcia', 'email' => 'lisa@example.com'],
        ];


        foreach ($usersData as $userData) {
            $users[] = User::updateOrCreate(
                [
                    'email' => $userData['email'],
                    'email_verified_at' => now(),
                ],
                [...$userData, 'password' => Hash::make('password')]
            );
        }


        // Create mechanics
        $mechanicsData = [
            'John Smith',
            'Maria Rodriguez',
            'David Johnson',
            'Sarah Williams',
            'Michael Brown'
        ];

        // Create cars - one for each user
        $carModels = [
            'Toyota',
            'Honda',
            'Ford',
            'BMW',
            'Mercedes',
            'Audi',
            'Tesla',
            'Chevrolet',
            'Nissan',
            'Volkswagen'
        ];

        $cars = [];

        $mechanics = [];
        foreach ($mechanicsData as $i => $mechanicName) {
            $mechanic = Mechanic::updateOrCreate(
                ['name' => $mechanicName]
            );

            $user = $users[$i];
            $car = $user->car()->updateOrCreate(
                [
                    'model' => $carModels[$i]
                ]
            );

            $mechanic->cars()->save($car);

            $cars[] = $car;

            $mechanics[] = $mechanic;
        }

        // Create car plates - one for each car
        $plateNumbers = [
            'AB123CD',
            'EF456GH',
            'IJ789KL',
            'MN012OP',
            'QR345ST',
            'UV678WX',
            'YZ901AB',
            'CD234EF',
            'GH567IJ',
            'KL890MN'
        ];


        foreach ($cars as $i => $car) {
            $number = $plateNumbers[$i];

            $plate = Plate::updateOrCreate(
                ['number' => $number, 'car_id' => $car->id],
                []
            );

            $plate->car()->associate($car)->save();
        }
    }
}
