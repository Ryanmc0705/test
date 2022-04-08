<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceDetail extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    public $timestamps = true;
    
    public function InvoiceHeader(){
        return $this->belongsTo(InvoiceHeader::class);
    }
}
