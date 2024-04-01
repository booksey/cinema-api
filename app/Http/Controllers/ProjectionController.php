<?php

namespace App\Http\Controllers;

use App\Models\Projection;
use App\Http\Requests\StoreProjectionRequest;
use App\Http\Requests\UpdateProjectionRequest;

class ProjectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Projection::all();
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
    public function store(StoreProjectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Projection $projection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projection $projection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectionRequest $request, Projection $projection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projection $projection)
    {
        //
    }
}
