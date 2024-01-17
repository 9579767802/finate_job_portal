@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Candidates</h2>

        <div class="row">
            @foreach($candidates as $candidate)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $candidate->name }}</h5>
                            <p class="card-text"><strong>Designation:</strong> {{ $candidate->designation }}</p>
                            <p class="card-text"><strong>Location:</strong> {{ $candidate->location }}</p>
                            <p class="card-text"><strong>Contact Number:</strong> {{ $candidate->contact_number }}</p>
                            <p class="card-text"><strong>User Profile Description:</strong> {{ $candidate->user_profile_description }}</p>
                            <p class="card-text"><strong>Age:</strong> {{ $candidate->age }}</p>
                            <p class="card-text"><strong>Gender:</strong> {{ $candidate->gender }}</p>
                            <p class="card-text"><strong>Experience:</strong> {{ $candidate->experience }}</p>
                            <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
