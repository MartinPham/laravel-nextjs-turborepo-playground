<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Garage\Car;
use App\Models\Garage\Mechanic;
use App\Models\Garage\Plate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use MartinPham\InertiaAttributes\Attributes\InertiaPage;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Group;

#[Group('/garage', as: 'garage')]
class GarageController extends Controller
{
    #[Get('/cars/{car}', name: '.car')]
    #[InertiaPage('Garage/Car')]
    public function car(Car $car): Car {
        return $car->load(['owner', 'plate', 'mechanic']);
    }

    #[Get('/cars', name: '.cars')]
    #[InertiaPage('Garage/Cars')]
    /**
     * @return LengthAwarePaginator<Car>
     */
    public function cars(): LengthAwarePaginator {
        return Car::with(['owner', 'plate', 'mechanic'])->paginate(3);
    }

    #[Get('/users/{user}', name: '.user')]
    #[InertiaPage('Garage/User')]
    /**
     * @return array{
     *     user: User,
     *     car: Car,
     *     plate: Plate,
     *     mechanic: Mechanic,
     *     requestedTime: Carbon
     * }
     */
    public function user(User $user): array {
        $car = $user->car()->first();
        $plate = $car->plate()->first();
        $mechanic = $car->mechanic()->first();
        $requestedTime = new Carbon();

        return [
            'user' => $user,
            'car' => $car,
            'plate' => $plate,
            'mechanic' => $mechanic,
            'requestedTime' => $requestedTime
        ];
    }
}
