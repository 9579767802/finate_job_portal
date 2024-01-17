<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'designation',
        'location',
        'contact_number',
        'user_profile',
        'age',
        'gender',
        'experience',
        'description',
        'shortlisted',
        'level',
        'qualification',
        'language',
        'professional_skill',
        'software_skill',
        'page',
    ];


    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_candidates', 'user_id', 'job_id');
    }
    // In your CandidateDetail model
public function showApplyJobs()
{
    return $this->belongsToMany(Job::class, 'job_candidates', 'candidate_id', 'job_id');
}


}
