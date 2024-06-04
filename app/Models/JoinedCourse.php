<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JoinedCourse extends Model
{
    use HasFactory, SoftDeletes;
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id')->with('trainer');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->select('id','name','last_name','phone','email');
    }
    public function trainee()
    {
        return $this->belongsTo(Trainee::class,'trainee_id','id')->select('id','date_of_birth','gender','city_from','city_currently_living_in','employed_status','study_status','skill_experience');
    }
    public function trainee_course()
    {
        return $this->belongsTo(Course::class,'course_id','id')->select('id','name');
    }
}
