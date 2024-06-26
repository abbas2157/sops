<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;
    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
    public function module_step()
    {
        return $this->belongsTo(ModuleStep::class,'step_id','id')->with('course');
    }
}
