<?php

namespace App\Http\Resources;

use App\Attempt;
use Illuminate\Http\Resources\Json\JsonResource;

class AttemptResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Attempt $this */
        return [
            'id'      => $this->id,
            'user'    => new UserResource($this->user),
            'type'    => $this->typeInfo(),
            'date'    => ($this->created_at->diffInDays() > 7 ?
                $this->created_at->format('Y.m.d H:i:s') :
                $this->created_at->diffForHumans()),
            'comment' => $this->comment,
        ];
    }
}