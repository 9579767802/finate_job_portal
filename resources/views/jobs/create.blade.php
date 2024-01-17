@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Add job</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('jobs.store') }}" id="add-jobs-form">
                    @csrf
                    <div class="mb-3 form-floating">

                        <input type="text" name="title" id="title" class="form-control title"
                            placeholder="Job Title">
                              <label for="title">Job Title</label>
                        <span class="titleError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <select name="job_type" id="job_type" class="form-control job_type">
                            <option value=" selected disabled">Select Job Type</option>
                            <option value="full time"> Full Time</option>
                            <option value="part time">Part Time</option>
                            <option value="remote">Remote</option>
                        </select>
                        <label for="job_type">Job Type</label>

                    </div>
                     <span class="job_typeError"></span>

                    <div class="mb-3 form-floating">
                        <input type="text" name="category" id="category" class="form-control category" placeholder="Category">
                        <label for="category">Category</label>
                        <span class="categoryError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="date" name="posted_date" id="posted_date" class="form-control posted_date">
                        <label for="posted_date">Posted Date</label>
                        <span class="posted_dateError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="date" name="application_end_date" id="application_end_date" class="form-control application_end_date">
                        <label for="application_end_date">Application End Date</label>
                        <span class="application_end_dateError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="number" name="salary" id="salary" class="form-control salary" placeholder="Salary">
                        <label for="salary">Salary</label>
                        <span class="salaryError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="text" name="skills" id="skills" class="form-control skills"
                            placeholder="skills">
                        <label for="skills">Skills</label>
                        <span class="skillsError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="text" name="address" id="address" class="form-control address" placeholder="address">
                        <label for="address">Address</label>
                        <span class="addressError"></span>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" name="experience" id="experience" class="form-control experience"
                            placeholder="Experience">
                        <label for="experience">Experience</label>
                        <span class="experienceError"></span>
                    </div>
                    <div class="mb-3 form-floating">
                        <select name="gender" id="gender" class="form-control gender">
                            <option value=" selected disabled">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        <label for="gender">Gender</label>
                        <span class="genderError"></span>
                    </div>


                    <div class="mb-3 form-floating">
                        <select name="qualification" id="qualification" class="form-control qualification" required>
                            <option value=" selected disabled">Select Qualification</option>
                            <option value="diploma">Diploma</option>
                            <option value="bachelor_of_engineering">Bachelor of Engineering</option>
                            <option value="bsc">BSc</option>
                            <option value="bca">BCA</option>
                            <option value="mca">MCA</option>
                            <option value="msc">MSC</option>
                            <option value="btech">BTech</option>
                        </select>
                        <label for="qualification">Qualification</label>
                        <span class="qualificationError"></span>
                    </div>

                    <div class="mb-3 form-floating">
                        <select name="level" id="level" class="form-control level">
                            <option value="selected disabled">Select Level</option>
                            <option value="senior">senior</option>
                            <option value="junior">Junior</option>
                            <option value="intern">Intern</option>
                        </select>
                        <label for="level">Level</label>
                        <span class="levelError"></span>
                    </div>



                    <div class="mb-3 form-floating">
                        <textarea name="description" id="description" class="form-control description" placeholder="Job Description"></textarea>
                        <label for="description">Job Description</label>
                        <span class="descriptionError"></span>
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
