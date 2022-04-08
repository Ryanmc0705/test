<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceHeader extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Company(){
        return $this->belongsTo(Company::class);
    }
    public function Branch(){
        return $this->belongsTo(Branch::class);
    }
    public function InvoiceDetail(){
        return $this->hasMany(InvoiceDetails::class,"head_id");
    }
    
    public $timestamps = true;
}
