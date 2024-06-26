<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ControllerHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Http\Resources\ActivityCollection;
use App\Repositories\ActivityRepositoryInterface;
use App\Services\DistanceCalculatorServiceInterface;
use App\Services\TimeCalculatorServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\App;

class ActivityController extends Controller
{
    protected const FILTERS = [
            'activity_type_id' => 'integer',
            'user_id' => 'integer',
    ];

    use ControllerHelper;

    public function __construct(
        protected ActivityRepositoryInterface $activityRepository,
        protected DistanceCalculatorServiceInterface $distanceCalculatorService,
        protected TimeCalculatorServiceInterface $timeCalculatorService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activities = $this->activityRepository->all();

        $this->simpleWhereFilter($request, $activities);

        $data = (new ActivityCollection($activities->paginate($request->integer('perPage', 10), null,
            $request->integer('page', 1))->withQueryString()));
        $data->total_distance = $this->distanceCalculatorService->sumPerUnit($activities);
        $data->total_time = $this->timeCalculatorService->sumTimes($activities);

        return $data;
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
    public function update(int $id, UpdateActivityRequest $request): JsonResource
    {
        $activity = $this->activityRepository->update($id, $request->validated());

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
