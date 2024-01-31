<?php
namespace App\Http\Controllers;

use App\DataTables\EmployersDataTable;
use App\Models\EmployerDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployerDetailController extends Controller
{
    public function index(EmployersDataTable $dataTable)
    {

        return $dataTable->render('employers.index');

    }

    public function show($id, EmployersDataTable $dataTable)
    {
        $employers = EmployerDetail::findOrFail($id);
        return $dataTable->render('employers.show', compact('employer'));

    }

    public function showjobs(EmployersDataTable $dataTable)
    {
        $jobs = job::Join('employer_details', 'jobs.id', '=', 'employer_details.job_id')
            ->select('jobs.id', 'jobs.title', 'jobs.category', 'jobs.salary', 'jobs.job_type', 'employer_details.logo')->get();
        return $dataTable->render('jobs.show_jobs');

    }

    public function create()
    {
        return view('employers.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'required|string|max:255',
            'since' => 'required|string|max:255',
            'team_members' => 'required|integer',
            'email' => 'required|email|max:255',
            'website' => 'required|string|max:255',
            'page' => 'required|string',
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');

            $imagePath = $request->file('logo')->store('company_images', 'public');
            $imageName = basename($imagePath);

            // Save the record in the database
            EmployerDetail::create([
                'name' => $request->input('name'),
                'location' => $request->input('location'),
                'contact_number' => $request->input('contact_number'),
                'logo' => $imageName,
                'categories' => $request->input('categories'),
                'since' => $request->input('since'),
                'team_members' => $request->input('team_members'),
                'email' => $request->input('email'),
                'website' => $request->input('website'),
                'page' => $request->input('page'),
            ]);

            return redirect()->route('employers.index')->with('success', 'Employer created successfully');

        }

        return back()->withErrors(['error' => 'Error uploading logo']);

    }

    public function profile($id)
    {
        // dd('jhj');
        $employers = EmployerDetail::where('user_id', $id)->first();
        return view('employers.edit', compact('employers'));
    }

    public function update(Request $request, $id)
    {
// dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'categories' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'since' => 'required|string|max:4',
            'team_members' => 'required|integer',
            'email' => 'required|email|max:255',
            'website' => 'required|string|max:255',
            'page' => 'nullable',


        ]);
// dd($data);



        if ($request->hasFile('logo')) {
            $existingLogo = employerDetail::where('user_id', $id)->value('logo');
            if (!empty($existingLogo)) {
                Storage::delete('public/storage/company_logos/' . $existingLogo);
            }

            $imagePath = $request->file('logo')->store('public/company_logos');
            $imageName = basename($imagePath);
            $data['logo'] = $imageName;
        }
        $employerData = employerDetail::updateOrCreate(['user_id' => $id], $data);

// dd($employerData);

        return redirect()->route('home')->with('success', 'Employer updated successfully');

    }

    public function destroy($id)
    {
        $employers = EmployerDetail::findOrFail($id);
        $employers->delete();

        return redirect()->route('employers.index')->with('success', 'Employer deleted successfully');
    }
}
