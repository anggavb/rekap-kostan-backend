<?php

namespace App\Http\Resources;

use Illuminate\Support\Arr;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return Arr::except(
            parent::toArray($request),
            ['id', 'created_at', 'updated_at']
        );
    }
}
