<?php

namespace App\Http\Controllers;
use DB;
use App\Company;
use App\CompanyType;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterCompanyRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Exception;
class RegisterCompanyController extends Controller
{

    protected function store(RegisterCompanyRequest $request)
    {
        $validated = $request->validated();
        $company = Company::createWithFile($validated);
        return view('welcome.registed', compact('company'));
    }

    protected function index()
    {
        $types = CompanyType::all();
        return view('welcome.register',compact('types')); 
    }
}
