<?php

namespace App\Http\Controllers;

use App\Http\Resources\RouteResource;
use App\Route;

class RouteController extends Controller
{
    public function index()
    {
        return RouteResource::collection(
            Route::with(['grade', 'author'])->get()
        );
    }

    public function show($route)
    {
        $route = Route::where('id', $route)->with([
            'attempts' => function ($q) {
                $q->latest();
                $q->where('user_id', 1); // @todo Change to current user
                $q->with('user');
                $q->take(20);
            },
        ])->firstOrFail();

        return new RouteResource($route);
    }
}