<?php

namespace App\Http\Resources;

use App\Route;
use Illuminate\Http\Resources\Json\JsonResource;

class RouteResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Route $this */
        return [
            'title' => $this->title,
            'color' => $this->color,
            'easier' => $this->easier,
            'grade' => new GradeResource($this->grade),
            'author' => new AuthorResource($this->author),
        ];
    }
}