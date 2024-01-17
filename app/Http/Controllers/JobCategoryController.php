<?php

namespace App\Http\Controllers;
use App\DataTables\AdminDataTable\JobsCategoryDataTable;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function index(JobsCategoryDataTable $datatable)
    {
        return $datatable->render('Admin.jobscategory.index');
    }

    public function create()
    {
        return view('Admin.jobscategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:job_categories|max:255',
           
        ]);

        JobCategory::create([
            'category' => $request->input('category'),
            
        ]);

        return redirect()->route('job-categories.index')->with('success', 'Job category created successfully');
    }

    public function show(JobCategory $jobCategory)
    {
        return view('job_categories.show', compact('jobCategory'));
    }

    public function edit($id)
    {
        $jobCategory = JobCategory::find($id);
        return view('Admin.jobscategory.edit', compact('jobCategory')); // Corrected the view path
    }

    public function update(Request $request, JobCategory $jobCategory)
    {
        $request->validate([
            'category' => 'required|max:255|unique:job_categories,category,' . $jobCategory->id,
            
        ]);

        $jobCategory->update([
            'category' => $request->input('category'),
        ]);

        return redirect()->route('job-categories.index')->with('success', 'Job category updated successfully');
    }

    public function destroy(JobCategory $JobCategory)
    {
        $JobCategory->delete();
        return redirect()->route('job-categories.index')->with('success', 'Job category deleted successfully');
    }
}
