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
}