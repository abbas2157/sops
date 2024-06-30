<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    public function createdby()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function trainer()
    {
        return $this->hasMany(Trainer::class,'course_id','id')->with('user');
    }

    public function baches()
    {
        return $this->hasMany(Batch::class);
    }
}
