<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceHeaderRequest;
use App\Http\Resources\InvoiceDetailResource;
use App\Http\Resources\InvoiceHeaderResource;
use App\Models\InvoiceHeader;


class InvoiceHeaderController extends Controller
{
    public function index()
    {
        $headers = InvoiceHeaderResource::collection(InvoiceHeader::with("Company")->get());
        return response(["headers" => $headers]);
    }

    public function store(InvoiceHeaderRequest $request)
    {
        $header = InvoiceHeader::create($request->only('invoice_number','invoice_date','address','sold_to','amount_paid','total','company_id','branch_id'));
        return response(["message" => "success"]);
    }

    public function update(InvoiceHeaderRequest $request,$id)
    {
        $header = InvoiceHeader::findOrFail($id);
        $header->update($request->only('invoice_number','invoice_date','address','sold_to','amount_paid','total'));
        return response(["message" => "success"]);
    }

    public function destroy($id)
    {
        $header = InvoiceHeader::where("id",$id)->delete();
        return response(["message" => "success"]);
    }

    public function showDetails($id)
    {
        $details = InvoiceDetailResource::collection(InvoiceHeader::findOrFail($id)->InvoiceDetail()->get());
        return response(["details" => $details]);
    }
    
}
