@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Update Job Details</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('jobs.update', $job->id) }}" id="editJobValidation">
                    @csrf
                    @method('put')
                    <div class="mb-3 form-floating">
                        <input type="text" name="title" id="title" class="form-control" value="{{ $job->title }}"
                            placeholder="Job Title">
                        <label for="title">Job Title</label>
                        <span class="titleError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <select name="job_type" id="job_type" class="form-control">
                            <option value="full time" {{ $job->job_type == 'full time' ? 'selected' : '' }}>Full Time
                            </option>
                            <option value="part time" {{ $job->job_type == 'part time' ? 'selected' : '' }}>Part Time
                            </option>
                            <option value="remote" {{ $job->job_type == 'remote' ? 'selected' : '' }}>Remote</option>
                        </select>
                        <label for="job_type">Job Type</label>
                        <div class="invalid-feedback">Please enter a job type.</div>
                        <span class="job_typeError"></span>

                    </div>

                    <div class="mb-3 form-floating">
                        <input type="text" name="category" id="category" class="form-control"
                            value="{{ $job->category }}" placeholder="Category">
                        <label for="category">Category</label>
                        <div class="invalid-feedback">Please enter a category.</div>
                        <span class="categoryError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="date" name="posted_date" id="posted_date" class="form-control"
                            value="{{ $job->posted_date }}">
                        <label for="posted_date">Posted Date</label>
                        <span class="posted_dateError"></span>

                    </div>

                    <div class="mb-3 form-floating">
                        <input type="date" name="application_end_date" id="application_end_date" class="form-control"
                            value="{{ $job->application_end_date }}">
                        <label for="application_end_date">Application End Date</label>
                        <span class="application_end_dateError"></span>

                    </div>

                    <div class="mb-3 form-floating">
                        <input type="text" name="salary" id="salary" class="form-control" value="{{ $job->salary }}"
                            placeholder="Salary">
                        <label for="salary">Salary</label>
                        <span class="salaryError"></span>

                    </div>

                    <div class="mb-3 form-floating">
                        <input type="text" name="skills" id="skills" class="form-control"
                            value="{{ $job->skills }}"placeholder="skills">
                        <label for="skills">skills</label>
                        <span class="skillsError"></span>

                    </div>

                    <div class="mb-3 form-floating">
                        <input type="text" name="address" id="address" class="form-control"
                            value="{{ $job->address }}"placeholder="address">
                        <label for="address">Address</label>
                        <span class="addressError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="text" name="experience" id="experience" class="form-control"
                            value="{{ $job->experience }}" placeholder="Experience">
                        <label for="experience">Experience</label>
                        <span class="experienceError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <select name="gender" id="gender" class="form-control">
                            <option value="" selected disabled>Select Gender</option>
                            <option value="male" {{ $job->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $job->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $job->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <label for="gender">Gender</label>
                        <span class="genderError"></span>

                        <div class="invalid-feedback">Please select a gender.</div>
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="text" name="qualification" id="qualification" class="form-control"
                            value="{{ $job->qualification }}" placeholder="Qualification" required>
                        <label for="qualification">Qualification</label>
                        <span class="qualificationError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <select name="level" id="level" class="form-control">
                            <option value="senior" {{ $job->level == 'senior' ? 'selected' : '' }}>Senior</option>
                            <option value="junior" {{ $job->level == 'junior' ? 'selected' : '' }}>Junior</option>
                            <option value="intern" {{ $job->level == 'intern' ? 'selected' : '' }}>Intern</option>
                        </select>
                        <label for="level">Level</label>
                        <span class="levelError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <textarea name="description" id="description" class="form-control" placeholder="Job Description">{{ $job->description }}</textarea>
                        <label for="description">Job Description</label>
                        <span class="descriptionError"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Job</button>
                </form>
            </div>
        </div>
    </div>
@endsection
