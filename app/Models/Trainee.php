<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainee extends Model
{
    use HasFactory, SoftDeletes;
    public function getSmallAttribute()
    {
        return strtolower($this->city_from);
    }
    public function createdby()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function trainee_status()
    {
        return $this->belongsTo(JoinedCourse::class,'id','trainee_id')->select('id','trainee_id','type','status','course_id')->with('trainee_course');
    }
}
