<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFitnessRequest;
use App\Http\Requests\UpdateFitnessRequest;
use App\Models\Fitness;

class FitnessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreFitnessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fitness $fitness)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fitness $fitness)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFitnessRequest $request, Fitness $fitness)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fitness $fitness)
    {
        //
    }
}
