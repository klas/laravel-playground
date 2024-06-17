<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ActivityResource::collection(Activity::simplePaginate(
            $request->integer('perPage', 10)
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        $activity = Activity::create($request->validated());

        return new ActivityResource($activity);
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return new ActivityResource($activity);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $activity->update($request->validated());

        return new ActivityResource($activity);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return response(null, 204);
    }
}
