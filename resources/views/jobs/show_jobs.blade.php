@extends('layouts.app')
@section('content')
    <div class="container">
        <section class="recent-job-area recent-job-inner-area">
            <div class="container">
                @if (count($jobs) > 0)
                    <div class="row">
                        @foreach ($jobs as $job)
                            <div class="col-md-6 col-lg-4">
                                <div class="recent-job-item recent-job-style2-item">
                                    <div class="company-info">
                                        <div class="logo">

                                            @if ($job->logo)
                                                <a href="#">
                                                    <img src="{{ asset('storage/company_logos/' . $job->logo) }}"
                                                        width="160" height="160" alt="{{ $job->logo }}">
                                                </a>
                                            @endif
                                        </div>

                                        <div class="content">
                                            <h4 class="name"><a href="javascript:;">{{ $job->name }}</a></h4>
                                            <p class="">{{ $job->address }}</p>
                                        </div>
                                    </div>
                                    <div class="main-content">
                                        <h3 class="title"><a href="job-details.html">{{ $job->category }}</a></h3>
                                        <h5 class="work-type">{{ $job->job_type }}</h5>
                                        <p class="desc">{{ $job->skills }}</p>

                                    </div>
                                    <div class="recent-job-info">
                                        <div class="salary">
                                            <h4>{{ $job->salary }}</h4>
                                            <p>/monthly</p>
                                        </div>
                                        <a href="{{ route('apply', ['jobId' => $job->id]) }}" class="btn-theme btn-sm">Apply Now</a>


                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-success" role="alert">
                        No jobs available at the moment.
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
