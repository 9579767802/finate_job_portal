<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'location', 'contact_number', 'logo', 'categories', 'since', 'team_members', 'email', 'website', 'page', 'status', 'user_id',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'employer_id', 'id');
    }
}
