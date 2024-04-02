<?php

namespace App\Http\Controllers;

use App\Models\Projection;
use App\Http\Requests\StoreProjectionRequest;
use App\Http\Requests\UpdateProjectionRequest;
use App\Http\Resources\Projection as ResourcesProjection;
use Illuminate\Http\Response;

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
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectionRequest $request)
    {
        return response()->json(Projection::create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Projection $projection)
    {
        return response()->json(Projection::findOrFail($projection->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectionRequest $request, Projection $projection)
    {
        $projection->update($request->all());
        return response()->json($projection, Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projection $projection)
    {
        return response()->json($projection->delete(), Response::HTTP_NO_CONTENT);
    }
}
