<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceDetails extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
   
    public function InvoiceHeader(){
        return $this->belongsTo(InvoiceHeader::class,"head_id");
    }
    public $timestamps = true;
}
