<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Film::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilmRequest $request)
    {
        return response()->json(Film::create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return response()->json(Film::findOrFail($film->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilmRequest $request, Film $film)
    {
        $film->update($request->all());
        return response()->json($film, Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        return response()->json($film->delete(), Response::HTTP_NO_CONTENT);
    }
}
