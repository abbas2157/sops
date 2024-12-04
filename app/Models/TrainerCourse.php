<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerCourse extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id')->select('id','name','image');
    }
    public function trainer()
    {
        return $this->belongsTo(Trainer::class,'trainer_id','id')->select('id', 'user_id', 'gender', 'areas_of_expertise', 'curriculum_vitae')->with('user');
    }
    public function assignedby()
    {
        return $this->belongsTo(User::class,'assigned_by','id')->select('id','name','last_name');
    }
}
