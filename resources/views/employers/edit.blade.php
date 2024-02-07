<!-- resources/views/employerss/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2>Profile</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employers.update', auth()->user()->id) }}"
                            id="employers-update-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 form-floating">

                                <input type="text" class="form-control name" name="name" id="name"
                                    placeholder="Name"
                                    value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}">
                                <label for="name">Name</label>
                                <span class="nameError"></span>
                            </div>

                            <div class="mb-3 form-floating">

                                <input type="text" class="form-control categories" name="categories" id="categories"
                                    placeholder="Enter categories" value="{{ $employer->categories ?? '' }}" required>
                                <label for="categories">Categories</label>
                                <span class="categoriesError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control location" name="location" id="location"
                                    placeholder="Location" value="{{ $employer->location ?? '' }}">
                                <label for="location">Location</label>
                                <span class="locationError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="number" class="form-control contact_number" name="contact_number"
                                    id="contact_number"
                                    placeholder="Contact Number"value="{{ auth()->user()->contact_number }}" required>
                                <label for="contact_number">Contact Number</label>
                                <span class="contact_numberError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="number" class="form-control since" name="since" id="since"
                                    placeholder="Since" value="{{ $employer->since ?? '' }}" required>
                                <label for="since">Since</label>
                                <span class="sinceError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="number" class="form-control team_members" name="team_members"
                                    id="team_members" placeholder="Team Members" value="{{ $employer->team_members ?? '' }}"
                                    required>
                                <label for="team_members">Team Members</label>
                                <span class="team_membersError"></span>
                            </div>

                            <div class="mb-3 input-group">
                                <label class="input-group " for="logo">Logo </label>

                                <input type="file" class="form-control" id="logo" name="logo">
                                <span class="logoError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="email" class="form-control email" name="email" id="email"
                                    placeholder="Email" value="{{ auth()->user()->email ?? '' }}" required>
                                <label for="email">Email</label>
                                <span class="emailError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control website" name="website" id="website"
                                    placeholder="Website" value="{{ $employer->website ?? '' }}" required>
                                <label for="website">Website</label>
                                <span class="websiteError"></span>
                            </div>

                            <div class="mb-3 form-floating">
                                <textarea id="editor" class="form-control page"name="page"></textarea>
                                <label for="editor"></label>
                                <span class="pageError"></span>
                            </div>

                            <button type="submit" class="btn btn-success float-start">Update</button>
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
