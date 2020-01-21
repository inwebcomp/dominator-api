<?php

namespace App\Http\Resources;

use App\Grade;
use Illuminate\Http\Resources\Json\JsonResource;

class GradeResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Grade $this */
        return [
            'title' => $this->title,
        ];
    }
}