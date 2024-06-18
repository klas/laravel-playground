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
    protected const FILTERS = [
            'activity_type_id' => 'integer',
    ];

    public function __construct(protected ActivityRepositoryInterface $activityRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activities = $this->activityRepository->all();

        foreach (self::FILTERS as $parameter => $type) {
            if ($request->filled($parameter)) {
                $activities->where($parameter, '==', $request->$type($parameter));
            }
        }

        return ActivityResource::collection($activities->paginate($request->integer('perPage', 10)));
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
    public function show(int $id): JsonResource
    {
        $activity = $this->activityRepository->find($id);

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
    public function destroy(int $id): Response|ResponseFactory
    {
        $this->activityRepository->delete($id);

        return response(null, 204);
    }
}
