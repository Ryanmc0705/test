<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function store(Request $request){
        $request->validate([
            "name" => "required"
        ]);
        $branch = Branch::create([
            "name" => $request->name,
            "company_id" => $request->company_id
        ]);
        return response([
            "message" => "success",
            "branch" => $branch
        ],200);
    }
    public function update(Request $request,$id){
        $branch = Branch::findOrFail($id);
        $branch->name = $request->name;
        if($branch->save()){
            return response([
                "message" => "success",
                "branch" => $branch
            ],200);
        }
    }
    public function destroy($id){
        $branch = Branch::where("id",$id)->delete();
        return response([
            "message" => "success"
        ],201);
    }
    public function show($id){
        return response([
            "branch" => Branch::findOrFail($id)->get(["id","company_id","name"])
        ]);
    }
}
