<?php

namespace App\Http\Controllers\API;
use App\Requeriment;
use App\Company;
use App\Http\Resources\CompanyResource;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        $query = Company::when($search, function($query) use ($search) {
            return $query->where('name','like','%'. $search .'%');
        })
        ->when($status, function($query) use ($status){
            return $query->where('status','like','%'. $status .'%');
        })
        ->orderBy('id','desc');
        return CompanyResource::collection($query->paginate(12));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $validated = $request->validated();
        $company->update($validated['company']);
        $company->people()->update($validated['contact']);
        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json([],204);
    }

    public function reprobar(Company $company)
    {
        $company->update(['status' => 'RECHAZADA']);
        return new CompanyResource($company);
    }

    public function procesar(Company $company)
    {
        $company->procesar();
        return new CompanyResource($company);
    }
}
