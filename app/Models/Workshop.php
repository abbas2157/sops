<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workshop extends Model
{
    use HasFactory, SoftDeletes;
    public function createdby()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
