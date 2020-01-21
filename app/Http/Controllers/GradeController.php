<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Http\Resources\GradeResource;

class GradeController extends Controller
{
    public function index()
    {
        return GradeResource::collection(
            Grade::latest()->get()
        );
    }
}
