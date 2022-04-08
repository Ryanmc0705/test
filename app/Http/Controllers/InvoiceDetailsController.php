<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceDetailsRequest;
use App\Models\InvoiceDetails;
use Illuminate\Http\Request;

class InvoiceDetailsController extends Controller
{
    public function index()
    {
        $details = InvoiceDetails::collection(InvoiceDetails::all());
        return response(["details" => $details]);
    }

    public function store(InvoiceDetailsRequest $request)
    {
       $details = InvoiceDetails::create($request->only('description','quantity','amount','head_id'));
       return response(["message" => "success","details" => $details]);
    }

    public function update(InvoiceDetailsRequest $request,$id)
    {
        $details = InvoiceDetails::findOrFail($id);
        $details->create($request->only('description','quantity','amount','head_id'));
        return response(["message" => "success","details" => $details]);
    }

    public function destroy($id){
        $details = InvoiceDetails::findOrFail($id)->delete();
    }
}
