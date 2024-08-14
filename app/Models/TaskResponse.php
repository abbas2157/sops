<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskResponse extends Model
{
    use HasFactory, SoftDeletes;
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id')->select('id','name');
    }
    public function batch(){
        return $this->belongsTo(Batch::class,'batch_id','id')->select('id','title','code');
    }
    public function class(){
        return $this->belongsTo(ClassSchedule::class,'class_id','id')->select('id','title');
    }
    public function task(){
        return $this->belongsTo(Task::class,'task_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->select('id','name','last_name','phone','email')->with('trainee');
    }
}
