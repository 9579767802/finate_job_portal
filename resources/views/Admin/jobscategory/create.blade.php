

{{-- @extends('layouts.app')

@section('content')
    <h1>Create Job Category</h1>

    <form action="{{ route('job-categories.store') }}" method="POST">
        @csrf
        <label for="name">Category Name:</label>
        <input type="text" name="name" required>
        <!-- Add other form fields as needed -->

        <button type="submit">Create</button>
    </form>
@endsection --}}
{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Job Category</h1>

        <form action="{{ route('job-categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" class="form-control" name="name" required>
                <!-- Add other form fields as needed -->
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection --}}
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1>Add Job Category</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('job-categories.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="category">Category Name:</label>
                            <input type="text" class="form-control mb-2" name="category">
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


