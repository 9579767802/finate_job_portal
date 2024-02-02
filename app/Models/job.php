<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = [
        'title', 'job_type', 'employer_id', 'category', 'posted_date', 'application_end_date', 'salary', 'experience', 'gender', 'qualification', 'level', 'description', 'address', 'skills', 'page',
    ];
    public function employer()
    {
        return $this->belongsTo(EmployerDetail::class, 'employer_details', 'id', 'employer_id');
    }

    public function candidates()
    {
        return $this->belongsToMany(User::class, 'job_candidates', 'job_id', 'user_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    // Job model

    // public function employerDetails()
    // {
    //     return $this->hasOne(EmployerDetail::class, 'job_id', 'id');
    // }
public function employerDetails()
{
    return $this->hasOne(EmployerDetail::class,'id', 'employer_id');
}

}
