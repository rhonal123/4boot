<?php

namespace App\Http\Controllers\API;

use App\CompanyType;
use App\Http\Resources\CompanyTypeResource;
use App\Http\Requests\CompanyTypeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->input('search');
        $query = CompanyType::when($type, function($query) use ($type){
            return $query->where('type','like','%'. $type .'%');
        })
        ->orderBy('id','desc');
        return CompanyTypeResource::collection($query->paginate(12));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyTypeRequest $request)
    {
        $validated = $request->validated();
        return response()->json(new CompanyTypeResource(CompanyType::create($validated)),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyType  $companyType
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyType $companyType)
    {
        return new CompanyTypeResource($companyType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyType  $companyType
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyTypeRequest $request, CompanyType $companyType)
    {
        $validated = $request->validated();
        $companyType->update($validated);
        return response()->json($companyType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyType  $companyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyType $companyType)
    {
        $companyType->delete();
        return response()->json([],204);
    }
}
