<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function trainer()
    {
        return $this->belongsTo(Trainer::class,'id','user_id');
    }
    public function trainee()
    {
        return $this->belongsTo(Trainee::class,'id','user_id')->with('trainee_status')->select('id','date_of_birth','gender','city_from','city_currently_living_in','employed_status','study_status','skill_experience','user_id','created_by')->with('createdby');
    }
    public function u_trainee()
    {
        return $this->belongsTo(Trainee::class,'id','user_id')->select('id','date_of_birth','gender','city_from','city_currently_living_in','employed_status','study_status','skill_experience','user_id','created_by')->with('createdby');
    }
    public function getFullNameAttribute()
    {
        return $this->name . " " . $this->last_name;
    }
    public function getSmallAttribute()
    {
        return strtolower($this->city_from);
    }
}
