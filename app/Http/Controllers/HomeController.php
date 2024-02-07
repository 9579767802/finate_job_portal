<?php

namespace App\Http\Controllers;

use App\Models\CandidateDetail;
use App\Models\Job;
use App\Models\JobCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobCount = Job::where('status', 1)->count();
        $jobs = Job::leftJoin('employer_details', 'jobs.employer_id', '=', 'employer_details.id')
            ->select('jobs.id', 'jobs.address', 'jobs.title', 'jobs.category', 'jobs.skills', 'jobs.salary', 'jobs.job_type', 'employer_details.name', 'employer_details.logo', 'jobs.status')
            ->where('jobs.status', 1)
            ->get();
        $jobCategories = JobCategory::all();
        $candidates = CandidateDetail::all();
        return view('home', compact('jobCount', 'jobs', 'jobCategories', 'candidates'));
    }
    // HomeController.php

    public function showJobDetails($category)
    {
        $jobs = Job::leftJoin('employer_details', 'jobs.employer_id', '=', 'employer_details.id')
            ->select('jobs.id', 'jobs.address', 'jobs.title', 'jobs.category', 'jobs.skills', 'jobs.salary', 'jobs.job_type', 'employer_details.name', 'employer_details.logo', 'jobs.status')
            ->where('jobs.status', 1)
            ->where('jobs.category', $category)
            ->get();

        return view('jobs.show_jobs', compact('jobs'));
    }
}
