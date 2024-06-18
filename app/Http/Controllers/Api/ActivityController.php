<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use App\Repositories\ActivityRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class ActivityController extends Controller
{

    public function __construct(protected ActivityRepositoryInterface $activityRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ActivityResource::collection($this->activityRepository->simplePaginate(
            $request->integer('perPage', 10)
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request): JsonResource
    {
        $activity = $this->activityRepository->create($request->validated());

        return new ActivityResource($activity);
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity): JsonResource
    {
        return new ActivityResource($activity);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request): JsonResource
    {
        $activity = $this->activityRepository->update($request->integer('id'), $request->validated());

        return new ActivityResource($activity);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): Response|ResponseFactory
    {
        $this->activityRepository->delete($request->integer('id'));

        return response(null, 204);
    }
}
