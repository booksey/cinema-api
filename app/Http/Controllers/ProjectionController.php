<?php

namespace App\Http\Controllers;

use App\Models\Projection;
use App\Http\Requests\StoreProjectionRequest;
use App\Http\Requests\UpdateProjectionRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProjectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        //@phpstan-ignore-next-line
        return response()->json(Projection::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectionRequest $request): JsonResponse
    {
        //@phpstan-ignore-next-line
        return response()->json(Projection::create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Projection $projection): JsonResponse
    {
        //@phpstan-ignore-next-line
        return response()->json(Projection::findOrFail($projection->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectionRequest $request, Projection $projection): JsonResponse
    {
        $projection->update($request->all());
        //@phpstan-ignore-next-line
        return response()->json($projection, Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projection $projection): JsonResponse
    {
        //@phpstan-ignore-next-line
        return response()->json($projection->delete(), Response::HTTP_NO_CONTENT);
    }
}
