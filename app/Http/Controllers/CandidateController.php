<?php

namespace App\Http\Controllers;

use App\DataTables\AppliedCandidateDataTable;
use App\Models\CandidateDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index()
    {
        $perPage = 5;

        $candidates = CandidateDetail::paginate($perPage);

        return view('candidate.index', compact('candidates'));
    }

    public function candidateDetails(AppliedCandidateDataTable $datatable)
    {
        $employerId = Auth::id();
        // $jobAppliedCandidates = CandidateDetail::whereHas('jobs', function ($query) use ($employerId) {
        //     $query->where('employer_id', $employerId);
        // })->get();
        $jobAppliedCandidates = CandidateDetail::with(['jobs' => function ($q) use ($employerId) {
            $q->where('employer_id', $employerId);
        }])->get();

        return $datatable->render('candidate.applied-candidates', compact('jobAppliedCandidates'));
    }

    public function show($id)
    {

        $candidates = CandidateDetail::find($id);
        return view('candidate.show', compact('candidates'));
    }

    public function candidateShow()
    {

        return view('candidate.candidate_details');
    }

    public function create()
    {
        return view('candidate.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'user_profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'age' => 'required|integer',
            'gender' => 'required|in:male,female,other',
            'experience' => 'required|integer',
            'description' => 'required|string',
            'language' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:255',
            'page' => 'nullable|string',
        ]);
        $userId = Auth::id();
        $imagePath = $request->file('user_profile')->store('user_profile', 'public');
        $imageName = basename($imagePath);
        CandidateDetail::create(array_merge($data, ['user_profile' => $imageName, 'user_id' => $userId]));
        return redirect()->route('candidate.index')->with('success', 'Candidate created successfully');
    }
    public function edit($id)
    {
        $candidate = CandidateDetail::where('user_id', $id)->first();

        return view('candidate.edit', compact('candidate'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'age' => 'required|integer',
            'gender' => 'required|in:male,female,other',
            'experience' => 'required|integer',
            'language' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:255',
            'description' => 'required|string',
            'professional_skill' => 'required|string',
            'software_skill' => 'required|string',
            'page' => 'nullable',
        ]);

        if ($request->hasFile('user_profile')) {
            $user_profile = CandidateDetail::where('user_id', $id)->value('user_profile');
            if (!empty($user_profile)) {
                Storage::delete('storage/user_profile/' . $user_profile);
            }
            $imagePath = $request->file('user_profile')->store('storage/user_profile', 'public');
            $imageName = basename($imagePath);

            $data['user_profile'] = $imageName;
        }
        $candidateData = CandidateDetail::updateOrCreate(['user_id' => $id], $data);

        return redirect()->route('home')->with('success', 'Candidate updated successfully');
    }

    public function destroy($id)
    {
        $candidates = CandidateDetail::find($id);
        $candidates->delete();

    }

    public function showCandidateDetails($id)
    {
        $jobAppliedCandidate = CandidateDetail::findOrFail($id);
        return view('candidate.candidate_details', compact('jobAppliedCandidate'));
    }

    public function updateShortlist($id)
    {
        $candidate = CandidateDetail::findOrFail($id);
        $candidate->update(['shortlisted' => !$candidate->shortlisted]);

        return response()->json(['message' => 'Candidate shortlisted successfully']);
    }

}
