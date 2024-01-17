<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmployerDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs/store', [JobController::class, 'store'])->name('jobs.store');
Route::get('/jobs/edit/{id}', [JobController::class, 'edit'])->name('jobs.edit');
Route::put('/jobs/update/{id}', [JobController::class, 'update'])->name('jobs.update');
Route::get('/jobs/delete/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');
Route::get('/jobs/show', [JobController::class, 'showjobs'])->name('jobs.show');
Route::get('/jobs/show/{id}', [JobController::class, 'showJobDetails'])->name('jobs.showJobDetails');
Route::post('/apply/{jobId}', [JobController::class, 'apply'])->name('apply');
Route::get('/jobs/search', [JobController::class, 'searchJobs'])->name('jobs.search');
Route::get('/jobs/details', [JobController::class, 'jobsDetails'])->name('jobs.details');

Route::get('/employers', [EmployerDetailController::class, 'index'])->name('employers.index');
Route::get('/employers/create', [EmployerDetailController::class, 'create'])->name('employers.create');
Route::post('/employers/store', [EmployerDetailController::class, 'store'])->name('employers.store');
Route::get('/employers/{id}', [EmployerDetailController::class, 'show'])->name('employers.show');
Route::get('/profile/{id}', [EmployerDetailController::class, 'Profile'])->name('profile');
Route::put('/profile/update', [EmployerDetailController::class, 'update'])->name('employers.update');

Route::put('/employers/update/{id}', [EmployerDetailController::class, 'update'])->name('employers.update');
Route::delete('/employers/delete/{id}', [EmployerDetailController::class, 'destroy'])->name('employers.destroy');
Route::get('/candidate', [CandidateController::class, 'index'])->name('candidate.index');
Route::get('applied/candidate/', [CandidateController::class, 'candidateDetails'])->name('candidate.applied-candidates');
Route::get('/candidate/create', [CandidateController::class, 'create'])->name('candidate.create');
Route::post('/candidate', [CandidateController::class, 'store'])->name('candidate.store');
Route::get('/candidate/show/{id}', [CandidateController::class, 'show'])->name('candidate.show');
Route::get('/candidate/details', [CandidateController::class, 'candidateShow'])->name('candidate.details');

Route::get('candidate/edit/{id}', [CandidateController::class, 'edit'])->name('candidate.edit');

Route::put('/candidate/update/{id}', [CandidateController::class, 'update'])->name('candidate.update');
Route::get('/candidate/destroy/{id}', [CandidateController::class, 'destroy'])->name('candidate.destroy');

Route::get('/admin/details', [AdminController::class, 'showDetails'])->name('admin.details');

Route::get('/admin/candidatelist', [AdminController::class, 'showCandidateList'])->name('admin.candidatelist');

Route::get('/profile/{id}', [AdminController::class, 'Profile'])->name('admin.profile');
Route::put('/employers/update/{id}', [AdminController::class, 'update'])->name('admin.update');



Route::get('/job-categories', [JobCategoryController::class, 'index'])->name('job-categories.index');
Route::get('/job-categories/create', [JobCategoryController::class, 'create'])->name('job-categories.create');
Route::post('/job-categories', [JobCategoryController::class, 'store'])->name('job-categories.store');
Route::get('/job-categories/{id}', [JobCategoryController::class, 'show'])->name('job-categories.show');
Route::get('/job-categories/{id}/edit', [JobCategoryController::class, 'edit'])->name('job-categories.edit');
Route::put('/job-categories/{id}', [JobCategoryController::class, 'update'])->name('job-categories.update');
Route::delete('/job-categories/{JobCategory}', [JobCategoryController::class, 'destroy'])->name('job-categories.destroy');
Route::post('/toggle-status/{job}', [JobController::class, 'toggleStatus']);

Route::post('/update-status/{id}', [AdminController::class, 'updateStatus']);

// routes/web.php

Route::get('/candidate/details/{id}', [CandidateController::class, 'showCandidateDetails'])->name('candidate.shortlist');
Route::post('/update-shortlist/{id}', [CandidateController::class, 'updateShortlist'])->name('update.shortlist');

Route::get('/job-details/{category}', [HomeController::class, 'showJobDetails'])->name('job-details.show');
Route::get('/candidate-details/{id}', [HomeController::class, 'showCandidates'])->name('candidate-details.show');
