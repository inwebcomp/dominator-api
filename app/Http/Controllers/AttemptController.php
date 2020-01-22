<?php

namespace App\Http\Controllers;

use App\Attempt;
use App\Route;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AttemptController extends Controller
{
    /**
     * @param Request $request
     * @param Route   $route
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Route $route)
    {
        /** @var User $user */
        $user = User::first(); // @todo Change user to auth()->user();

        $this->validate($request, [
            'type' => [
                'required',
                Rule::in(array_map(function($value) {
                    return $value['name'];
                }, Attempt::types()))
            ]
        ]);

        $user->attempts()->create([
            'route_id' => $route->id,
            'type' => Attempt::typeByName($request->input('type')),
        ]);
    }

    /**
     * @param Request $request
     * @param Attempt $attempt
     * @return void
     * @throws \Exception
     */
    public function delete(Request $request, Attempt $attempt)
    {
        /** @var User $user */
        $user = User::first(); // @todo Change user to auth()->user();

        // @todo Check permissions via gates
        if ($attempt->user_id != $user->id)
            return abort(403);

        $attempt->delete();
    }
}
