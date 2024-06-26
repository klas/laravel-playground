<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'created_at' => (string)
            $this->created_at,
            'updated_at' => (string)$this->updated_at,
            'name' => $this->name,
            'description' => $this->description,
            'activity_type' => $this->activity_type->name,
            'distance' => $this->distance,
            'distance_unit' => $this->distance_unit->name,
            'start' => (string)$this->start,
            'finish' => (string)$this->finish,
            'status' => $this->status,
            'user' => $this->user->name,
        ];
    }
}
