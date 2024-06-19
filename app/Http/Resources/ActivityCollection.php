<?php

namespace App\Http\Resources;

use App\Services\DistanceCalculatorServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\App;

class ActivityCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                'data' => parent::toArray($request),
                'total_distance' => App::make(DistanceCalculatorServiceInterface::class)
                    ->sumPerUnit($this->collection)->toArray(),
            ];
    }
}
