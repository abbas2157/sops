<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchStudent extends Model
{
    use HasFactory;
    public function batch()
    {
        return $this->belongsTo(Batch::class,'batch_id','id')->select('id','title','type');
    }
    public function student()
    {
        return $this->belongsTo(User::class,'user_id','id')->select('id','name','last_name','email','phone');
    }
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id')->select('id','name');
    }
}
