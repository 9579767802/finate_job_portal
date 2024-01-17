    <!-- resources/views/job_categories/edit.blade.php -->

    @extends('layouts.app')

    @section('content')
        <div class="container mt-4">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Job Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('job-categories.update', $jobCategory->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="name">Category Name:</label>
                            <input class="form-control" type="text" name="name" value="{{ $jobCategory->category }}"
                                required>
                            <button class="btn btn-success" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
