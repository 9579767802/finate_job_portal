<?php
namespace App\Http\Controllers;

use App\DataTables\JobsDataTable;
use App\Http\Controllers\Controller;
use App\Models\EmployerDetail;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(JobsDataTable $dataTable)
    {
        return $dataTable->render('jobs.index');
    }
    public function showjobs()
    {

        $jobs = Job::leftJoin('employer_details', 'jobs.employer_id', '=', 'employer_details.id')
            ->select('jobs.id', 'jobs.address', 'jobs.title', 'jobs.category', 'jobs.skills', 'jobs.salary', 'jobs.job_type', 'employer_details.name', 'employer_details.logo', 'jobs.status')
            ->where('jobs.status', 1)
            ->get();
// dd($jobs);
        return view('jobs.show_jobs', compact('jobs'));

    }

    public function showJobDetails($jobId)
    {
        $job = Job::with('employerDetails')->find($jobId);

        if (!$job) {
            abort(404);
        }

        return view('jobs.jobdetails', compact('job'));
    }

    public function jobsDetails()
    {
        return view('jobs.jobdetails');
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'job_type' => 'required',
            'address' => 'required',
            'category' => 'required',
            'posted_date' => 'required|date',
            'application_end_date' => 'required|date|after:posted_date',
            'salary' => 'required|numeric',
            'experience' => 'required|numeric',
            'gender' => 'required|in:male,female,other',
            'qualification' => 'required',
            'level' => 'required',
            'description' => 'required',
            'skills' => 'required',
        ]);
        $data['user_id'] = Auth::id();
        $data['employer_id'] = EmployerDetail::where('user_id', Auth::id())->value('id');
        Job::create($data);
// dd($data);
        return redirect()->route('jobs.index');
    }

    // public function store(Request $request)
    // {

    //     $data = $request->validate([
    //         'title' => 'required',
    //         'job_type' => 'required',
    //         'category' => 'required',
    //         'posted_date' => 'required|date',
    //         'application_end_date' => 'required|date|after:posted_date',
    //         'salary' => 'required|numeric',
    //         'experience' => 'required|integer',
    //         'gender' => 'required|in:Male,Female,Other',
    //         'qualification' => 'required',
    //         'level' => 'required',
    //         'description' => 'required',
    //         'address' => 'required',
    //         'skills' => 'required|array',
    //     ]);

    //     $data['employer_id'] = EmployerDetail::where('user_id', Auth::id())->value('id');
    //     Job::create($data);

    //     return redirect()->route('jobs.index');
    // }

    //     $employerId = EmployerDetail::where('user_id', Auth::id())->value('id');

    //     dd($employerId);
    //     $requestData = $request->all();
    //     $requestData['employer_id'] = $employerId;

    //     Job::create($requestData);

    //     return redirect()->route('jobs.index');
    // }

    public function edit($id, JobsDataTable $dataTable)
    {
        $job = Job::findOrFail($id);

        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());
        notify()->success('job update successfully');
        return redirect()->route('jobs.index');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        notify()->success('job delete successfully');

        return redirect()->route('jobs.index');
    }
    public function apply($jobId)
    {
        $candidate = auth()->user()->role == 'candidate';

        $job = Job::find($jobId);

        $job->candidates()->attach($candidate);

        return redirect()->route('jobs.showJobDetails', $jobId)->with('success', 'Applied successfully!');
    }

    public function showJobsApply($jobId)
    {
        $job = Job::with(['candidates', 'employerDetails'])->find($jobId);
        return view('jobs.show_jobs', compact('job'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $job = Job::find($id);
        if ($job) {
            $newStatus = $request->input('status');
            $job->update(['status' => $newStatus]);

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Employer not found']);
        }
    }

    public function searchJobs(Request $request)
    {
        $keyword = $request->input('title');
        $city = $request->input('city');
// dd($city);

        $category = $request->input('category');

        $jobs = Job::with('employerDetails')
            ->where('title', 'like', '%' . $keyword . '%')
            ->leftJoin('employer_details', 'jobs.employer_id', '=', 'employer_details.id')
            ->select('jobs.id', 'jobs.address', 'jobs.title', 'jobs.category', 'jobs.skills', 'jobs.salary', 'jobs.job_type', 'employer_details.name', 'employer_details.logo')
            ->get();

        return view('jobs.show_jobs', compact('jobs'));
    }

}
