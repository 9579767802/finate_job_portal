@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card mx-auto">
                    <div class="card-header">
                        <h2 class="mb-0">Candidate Details</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('candidate.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder=" ">
                                <label for="name">Full Name</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="designation" name="designation"
                                    placeholder=" ">
                                <label for="designation">Designation</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="professional_skills"
                                    name="professional_skills" placeholder=" ">
                                <label for="professional_skills">Professional Skills</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="software_skills" name="software_skills"
                                    placeholder=" ">
                                <label for="software_skills">Software Skills</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="location" name="location" placeholder=" ">
                                <label for="location">Location</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="contact_number" name="contact_number"
                                    placeholder=" ">
                                <label for="contact_number">Contact Number</label>
                            </div>

                            <div class="mb-3 input-group">
                                <input type="file" class="form-control" id="user_profile" name="user_profile">
                                <label class="input-group-text" for="user_profile"></label>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="number" class="form-control" id="age" name="age" placeholder=" ">
                                <label for="age">Age</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <select class="form-control" id="gender" name="gender" placeholder=" ">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                <label for="gender">Gender</label>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="number" class="form-control" id="experience" name="experience"
                                    placeholder=" ">
                                <label for="experience">Experience (in years)</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="qualification" name="qualification">
                                <label for="qualification">Qualification </label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="langauge" name="langauge" placeholder=" ">
                                <label for="langauge">Langauge </label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="level" name="level" placeholder=" ">
                                <label for="level">Level </label>
                            </div>
                            <div class="mb-3 form-floating">
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder=" "></textarea>
                                <label for="description">Description</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <textarea id="editor" name="page"></textarea>           
                            </div>

                            <button type="submit" class="btn btn-primary">Save Candidate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
