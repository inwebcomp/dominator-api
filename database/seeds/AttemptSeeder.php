<?php

use App\Attempt;
use App\Route;
use App\User;
use Illuminate\Database\Seeder;

class AttemptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function(User $user) {
            $user->attempts()->saveMany(
                factory(Attempt::class, 10)->make()->each(function(Attempt $attempt) {
                    $attempt->route()->associate(Route::query()->inRandomOrder()->first());
                })
            );
        });
    }
}
