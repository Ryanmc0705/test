<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];
    public function InvoiceHeader(){
        return $this->hasMany(InvoiceHeader::class);
    }
    public function Company(){
        return $this->belongsTo(Company::class);
    }
    public $timesstamps = true;
}
