<?php

use App\Grade;
use App\Route;
use App\User;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    public function run()
    {
        factory(Route::class, 10)->create()->each(function(Route $route)  {
            if (rand(0, 100) > 20) {
                $route->grade()->associate(Grade::query()->inRandomOrder()->first())->save();
            }

            if (rand(0, 100) > 20) {
                $route->author()->associate(User::query()->inRandomOrder()->first())->save();
            }
        });
    }
}
