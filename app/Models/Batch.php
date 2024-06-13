<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batch extends Model
{
    use HasFactory, SoftDeletes;
    public function createdby()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id')->select('id','name');
    }
}
