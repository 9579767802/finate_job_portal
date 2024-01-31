@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2>User Profile</h2>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('candidate.update', auth()->user()->id) }}"
                            id="candidate-update-form" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control name" id="name" name="name"
                                    value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}"
                                    placeholder="Enter full name" required>
                                <label for="name">Full Name</label>
                                <span class="nameError"></span>

                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control designation" id="designation" name="designation"
                                    value="{{ $candidate->designation ?? '' }}" placeholder="Enter designation" required>
                                <label for="designation">Designation</label>
                                <span class="designationError"></span>

                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control location" id="location" name="location"
                                    value="{{ $candidate->location ?? '' }}" placeholder="Enter location" required>
                                <label for="location">Location</label>
                                <span class="locationError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control contact_number" id="contact_number"
                                    name="contact_number" value="{{ auth()->user()->contact_number }}"
                                    placeholder="Enter contact number" required>
                                <label for="contact_number">Contact Number</label>
                                <span class="contact_numberError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control professional_skill" id="professional_skill"
                                    name="professional_skill" value="{{ $candidate->professional_skill ?? '' }}"
                                    placeholder="Enter your professional_skill" required>
                                <label for="professional_skill">Professional Skill</label>
                                <span class="professional_skillError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control software_skill" id="software_skill"
                                    name="software_skill" value="{{ $candidate->software_skill ?? '' }}"
                                    placeholder="Enter your software_skill" required>
                                <label for="software_skill">Software Skill</label>
                                <span class="software_skillError"></span>

                            </div>

                            <div class="mb-3 form-floating">
                                <input type="number" class="form-control age" id="age" name="age"
                                    value="{{ $candidate->age ?? '' }}" placeholder="Enter age" required>
                                <label for="age">Age</label>
                                <span class="ageError"></span>

                            </div>

                            <div class="mb-3 form-floating">
                                <select class="form-control gender" id="gender" name="gender" required>
                                    <option value="male"
                                        {{ isset($candidate->gender) && $candidate->gender === 'male' ? 'selected' : '' }}>
                                        Male
                                    </option>
                                    <option value="female"
                                        {{ isset($candidate->gender) && $candidate->gender === 'female' ? 'selected' : '' }}>
                                        Female
                                    </option>
                                    <option value="other"
                                        {{ isset($candidate->gender) && $candidate->gender === 'other' ? 'selected' : '' }}>
                                        Other
                                    </option>
                                </select>
                                <label for="gender">Gender</label>
                                <span class="genderError"></span>
                            </div>
                            {{-- <label for="user_profile">User Profile</label> --}}
                            <div class="mb-3 input-group">
                                <label class="input-group "for="user_profile">Profile Picture</label>
                                <input type="file" class="form-control" id="user_profile" name="user_profile">
                                <span class="user_profileError"></span>
                            </div>

                            <div class="mb-3 input-group">
                                <label class="input-group "for="resume">Upload Resumes</label>
                                <input type="file" class="form-control" id="resume" name="resume">
                                <span class="resumeError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="number" class="form-control experience" id="experience" name="experience"
                                    value="{{ $candidate->experience ?? '' }}" placeholder="Enter experience" required>
                                <label for="experience">Experience</label>
                                <span class="experienceError"></span>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control description" id="description"
                                    name="description" value="{{ $candidate->description ?? '' }}"
                                    placeholder="Enter description" required>
                                <label for="description">description</label>
                                <span class="descriptionError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <select class="form-control qualification" id="qualification" name="qualification">
                                    <option value="" selected disabled>Select Qualification</option>
                                    <option value="BE"
                                        {{ isset($candidate->qualification) && $candidate->qualification === 'BE' ? 'selected' : '' }}>
                                        Bachelor of
                                        Engineering</option>
                                    <option value="BTech"
                                        {{ isset($candidate->qualification) && $candidate->qualification === 'BTech' ? 'selected' : '' }}>
                                        BTech
                                    </option>
                                    <option value="BSc"
                                        {{ isset($candidate->qualification) && $candidate->qualification === 'BSc' ? 'selected' : '' }}>
                                        BSc
                                    </option>
                                    <option value="MSc"
                                        {{ isset($candidate->qualification) && $candidate->qualification === 'MSc' ? 'selected' : '' }}>
                                        MSc
                                    </option>
                                </select>
                                <label for="qualification">Qualification</label>
                                <span class="qualificationError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control langauge" id="language" name="language"
                                    value="{{ $candidate->language ?? '' }}">
                                <label for="language">language </label>
                                <span class="languageError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <select class="form-control level" id="level" name="level">
                                    <option value="" selected disabled>Select Level</option>
                                    <option value="Senior"
                                        {{ isset($candidate->level) && $candidate->level === 'Senior' ? 'selected' : '' }}>
                                        Senior
                                    </option>
                                    <option value="Junior"
                                        {{ isset($candidate->level) && $candidate->level === 'Junior' ? 'selected' : '' }}>
                                        Junior
                                    </option>
                                    <option value="Intern"
                                        {{ isset($candidate->level) && $candidate->level === 'Intern' ? 'selected' : '' }}>
                                        Intern
                                    </option>
                                </select>
                                <label for="level">Level</label>
                                <span class="levelError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                            </div>
                            <div class="mb-3 form-floating">
                                <textarea id="editor"class="form-control editor" name="page">{{ $candidate->page ?? '' }}</textarea>
                                <span class="editorError"></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Candidate</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div id="editor"></div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
