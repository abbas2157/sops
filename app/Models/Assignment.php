<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory, SoftDeletes;
    public function step()
    {
        return $this->belongsTo(ModuleStep::class,'step_id','id')->select('id','type','steps_no','title','video','assignment');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->select('id','name','last_name','phone','email')->with('trainee');
    }
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id')->select('id','name');
    }
}
