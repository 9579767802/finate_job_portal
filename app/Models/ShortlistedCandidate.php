<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortlistedCandidate extends Model
{

    use HasFactory;
    protected $table = 'shortlisted_candidates';
    protected $fillable = [
        'employer_details_id',
        'candidate_details_id',
        'shortlisted',
    ];
    public function candidateDetail()
    {
        return $this->hasMany(CandidateDetail::class, 'id', 'candidate_details_id');
    }
}
