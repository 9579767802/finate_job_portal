
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card ">
            <div class="card-header">
                <h2>Add Employer</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('employers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label"> Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter employee name" required>
                    </div>
                     <div class="mb-3">
                        <label for="categories" class="form-label"> Categories</label>
                        <input type="text" class="form-control" id="categories" name="categories" placeholder="Enter categories" required>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">location</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" required>
                    </div>                    

                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter contact number" required>
                    </div>
                   
                      <div class="mb-3">
                        <label for="categories" class="form-label">Categories</label>
                        <input type="text" class="form-control" id="categories" name="categories" placeholder="Enter categories" required>
                    </div>

                    <div class="mb-3">
                        <label for="since" class="form-label">Since Year</label>
                        <input type="text" class="form-control" id="since" name="since" placeholder="Enter since year" required>
                    </div>

                    <div class="mb-3">
                        <label for="team_members" class="form-label">Team Members</label>
                        <input type="number" class="form-control" id="team_members" name="team_members" placeholder="Enter team members" required>
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                    </div>

                    <div class="mb-3">
                        <label for="website" class="form-label">Website URL</label>
                        <input type="text" class="form-control" id="website" name="website" placeholder="Enter website URL" required>
                    </div>
                            <div class="mb-3 form-floating">
                                <textarea id="editor" name="page"></textarea>           
                            </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success float-end+">Save Employee</button>
                    </div>
                </form>
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