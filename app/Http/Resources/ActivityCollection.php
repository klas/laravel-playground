<?php

namespace App\Http\Resources;

use App\Services\DistanceCalculatorServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class ActivityCollection extends ResourceCollection
{
    public ?Collection $total_distance = null;

    public ?Carbon $total_time = null;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                'data' => parent::toArray($request),
                'total_distance' => $this->total_distance,
                'total_time' => $this->total_time
            ];
    }
}
