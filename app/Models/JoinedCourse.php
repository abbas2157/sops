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
    
}
