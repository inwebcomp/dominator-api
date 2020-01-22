<?php

namespace App\Http\Resources;

use App\Route;
use Illuminate\Http\Resources\Json\JsonResource;

class RouteResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Route|self $this */
        return [
            'id'     => $this->id,
            'title'  => $this->title,
            'color'  => $this->color,
            'easier' => $this->easier,
            'grade'  => new GradeResource($this->grade),
            'author' => new AuthorResource($this->author),
            'attempts' => $this->whenLoaded('attempts', function() {
                return AttemptResource::collection($this->attempts);
            })
        ];
    }
}