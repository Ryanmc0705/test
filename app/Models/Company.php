<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    public function InvoiceHeader(){
        return $this->hasMany(InvoiceHeader::class);
    }
    public function Branch(){
        return $this->hasMany(Branch::class);
    }

    public $timesstamps = true;
}
