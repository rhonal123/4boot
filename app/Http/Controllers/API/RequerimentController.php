<?php

namespace App\Http\Controllers\API;

use App\Requeriment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Requeriment;
use App\Http\Resources\RequerimentResource;
use App\Http\Requests\RequerimentRequest;


class RequerimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Requeriment::when($search, function($query) use ($search){
            return $query->where('name','like','%'. $search .'%');
        })
        ->orderBy('id','desc');
        return RequerimentResource::collection($query->paginate(12));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequerimentRequest $request)
    {
        $validated = $request->validated();
        return response()->json(Requeriment::create($validated),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requeriment  $requerimentType
     * @return \Illuminate\Http\Response
     */
    public function show(Requeriment $requerimentType)
    {
        return new RequerimentResource($requerimentType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requeriment  $requerimentType
     * @return \Illuminate\Http\Response
     */
    public function update(RequerimentRequest $request, Requeriment $requerimentType)
    {
        $validated = $request->validated();
        $requerimentType->update($validated);
        return response()->json($requerimentType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requeriment  $requerimentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requeriment $requerimentType)
    {
        $requerimentType->delete();
        return response()->json([],204);
    }
}
