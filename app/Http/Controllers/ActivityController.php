<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityCollection;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use App\Repositories\ActivityRepositoryInterface;
use App\Services\DistanceCalculatorServiceInterface;
use App\Services\TimeCalculatorServiceInterface;
use Illuminate\Http\Request;

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

        $data = [];
        $data['activities'] = $activities->paginate($request->integer('perPage', 10), null,
            $request->integer('page', 1))->withQueryString();
        $data['total_distance'] = $this->distanceCalculatorService->sumPerUnit($activities);
        $data['total_time'] = $this->timeCalculatorService->sumTimes($activities);

        return view('activities.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return new ActivityResource($activity);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
