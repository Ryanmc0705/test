<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyBranchResource;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        return response([
            "companies" => CompanyResource::collection(Company::all())
        ]);
    }
    public function show($id){
        return response([
            "company" => new CompanyResource(Company::findOrFail($id))
        ]);
    }
    public function store(CompanyRequest $request){
        $company = Company::create([
            "name" => $request->name,
            "contact_number" => $request->contact_number,
            "address" => $request->address
        ]);

        return response([
            "company" => $company,
            "message" => "success"
        ],200);
    }
    public function update(CompanyRequest $request,$id){
        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->address = $request->address;
        $company->contact_number = $request->contact_number;
        if($company->save()){
            return response([
                "company" => $company,
                "message" => "success"
            ],200);
        }
    }
    public function destroy($id){
        $company = Company::where("id",$id)->delete();
        return response([
            "message" => "success"
        ]);
    }
    public function showBranches($company_id){
        $branches = Company::findOrFail($company_id)->Branch()->get();
        return response([
            "branches" => CompanyBranchResource::collection($branches) 
        ]);
    }
}
