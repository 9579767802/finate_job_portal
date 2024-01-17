<!-- resources/views/employerss/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">employers Details</h2>

        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>ID:</strong> {{ $employers->id }}</p>
                <p class="card-text"><strong>Categories:</strong> {{ $employers->categories }}</p>
                <p class="card-text"><strong>Name:</strong> {{ $employers->name }}</p>
                <p class="card-text"><strong>Location:</strong> {{ $employers->location }}</p>
                <p class="card-text"><strong>Contact Number:</strong> {{ $employers->contact_number }}</p>
                <p class="card-text"><strong>Logo:</strong> {{ $employers->logo }}</p>
                <p class="card-text"><strong>Since:</strong> {{ $employers->since }}</p>
                <p class="card-text"><strong>Team Members:</strong> {{ $employers->team_members }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $employers->email }}</p>
                <p class="card-text"><strong>Website:</strong> {{ $employers->website }}</p>

                <a href="{{ route('employers.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
