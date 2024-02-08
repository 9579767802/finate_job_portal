@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <main class="main-content">
            <section class="home-slider-area">
                <div class="home-slider-container default-slider-container">
                    <div class="home-slider-wrapper slider-default">
                        <div class="slider-content-area" data-bg-img="{{ asset('assets/img/slider-bg.webp') }}">
                            <div class="container pt--0 pb--0">
                                <div class="slider-container">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-12 col-lg-8">
                                            @if (Session::has('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ Session::get('success') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                                @php
                                                    Session::forget('success');
                                                @endphp
                                            @endif

                                            @if (Session::has('error'))
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    {{ Session::get('error') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                                @php
                                                    Session::forget('error');
                                                @endphp
                                            @endif
                                            <div class="slider-content">
                                                <h2 class="title">
                                                    <span class="counter" data-counterup
                                                        data-duration="500">{{ $jobCount }}</span> job available
                                                    <br>
                                                    You can choose your dream job
                                                </h2>
                                                <p class="desc">Find a great job to build your bright career. Many jobs
                                                    are available on this platform.</p>
                                            </div>
                                        </div>
                                        @if (!(Auth::user() && Auth::user()->role == 'employers'))
                                            <div class="col-12">
                                                <div class="job-search-wrap">
                                                    <div class="job-search-form">
                                                        <form action="{{ route('jobs.search') }}" method="GET">
                                                            @csrf
                                                            <div class="row row-gutter-10">
                                                                <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                                    <div class="form-group">
                                                                        <input type="text" name="title"
                                                                            class="form-control"
                                                                            placeholder="Job title or keywords">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                                    <div class="form-group">
                                                                        <select name="city" class="form-control">
                                                                            <option value="1" selected>Choose City
                                                                            </option>
                                                                            <option value="2">Pune</option>
                                                                            <option value="California">Mumbai</option>
                                                                            <option value="Illinois">Bangalore</option>
                                                                            <option value="5">chennai</option>
                                                                            <option value="6">Hyderabad</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                                    <div class="form-group">
                                                                        <select name="category" class="form-control">
                                                                            <option value="1" selected>Category
                                                                            </option>
                                                                            <option value="2">Web Designer</option>
                                                                            <option value="3">Web Developer</option>
                                                                            <option value="4">Graphic Designer</option>
                                                                            <option value="5">App Developer</option>
                                                                            <option value="6">UI &amp; UX Expert
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn-form-search"><i
                                                                                class="bi bi-arrow-right fs-3"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pt--0 pb--0">
                    <div class="row">
                        <div class="col-12">
                            <div class="play-video-btn">
                                <a href="https://www.youtube.com/mcvqOUtcAJg" class="video-popup">
                                    <img src="assets/img/icons/play.png" alt="Image-HasTech">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="home-slider-shape">
                    <img class="shape1" data-aos="fade-down" data-aos-duration="1500" src="assets/img/slider/vector1.png"
                        width="270" height="234" alt="Image-HasTech">
                    <img class="shape2" data-aos="fade-left" data-aos-duration="2000" src="assets/img/slider/vector2.png"
                        width="201" height="346" alt="Image-HasTech">
                    <img class="shape3" data-aos="fade-right" data-aos-duration="2000" src="assets/img/slider/vector3.png"
                        width="276" height="432" alt="Image-HasTech">
                    <img class="shape4" data-aos="flip-left" data-aos-duration="1500" src="assets/img/slider/vector4.png"
                        width="127" height="121" alt="Image-HasTech">
                </div>
            </section>
            <div class="row row-gutter-20">
                @foreach ($jobCategories as $jobCategory)
                    <div class="col-sm-6 col-lg-3">
                        <div class="job-category-item">
                            <div class="content">
                                <h3 class="title"><a href="{{ route('job-details.show', $jobCategory->category) }}">
                                        {{ $jobCategory->category }}
                                        <span></span>
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    </section>
    @if (Auth::user() && Auth::user()->role == 'candidate')
        <section class="recent-job-area bg-color-gray">
            <div class="container" data-aos="fade-down">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h3 class="title">Recent Job Circulars</h3>
                            <div class="desc">
                                <p>Many desktop publishing packages and web page editors</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($jobs as $job)
                        <div class="col-md-6 col-lg-4">

                            <div class="recent-job-item recent-job-style2-item">
                                <div class="company-info">
                                    <div class="logo">
                                        @if ($job->logo)
                                            <a href="candidate-details.html">
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
                                    <form method="POST" action="{{ route('apply', ['jobId' => $job->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn-theme btn-sm">Apply Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (!(Auth::user() && Auth::user()->role == 'employers'))
        <section class="work-process-area">
            <div class="container" data-aos="fade-down">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h3 class="title">How It Work?</h3>
                            <div class="desc">
                                <p>Many desktop publishing packages and web page editors</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="working-process-content-wrap">
                            <div class="working-col">
                                <div class="working-process-item">
                                    <div class="icon-box">
                                        <div class="inner">
                                            <img class="icon-img" src="assets/img/icons/w1.png" alt="Image-HasTech">
                                            <img class="icon-hover" src="assets/img/icons/w1-hover.png"
                                                alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Create an Account</h4>
                                        <p class="desc">It is long established fact reader distracted readable
                                            content</p>
                                    </div>
                                    <div class="shape-arrow-icon">
                                        <img class="shape-icon" src="assets/img/icons/right-arrow.png"
                                            alt="Image-HasTech">
                                        <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                            </div>
                            <div class="working-col">
                                <div class="working-process-item">
                                    <div class="icon-box">
                                        <div class="inner">
                                            <img class="icon-img" src="assets/img/icons/w2.png" alt="Image-HasTech">
                                            <img class="icon-hover" src="assets/img/icons/w2-hover.png"
                                                alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">CV/Resume</h4>
                                        <p class="desc">It is long established fact reader distracted readable
                                            content</p>
                                    </div>
                                    <div class="shape-arrow-icon">
                                        <img class="shape-icon" src="assets/img/icons/right-arrow.png"
                                            alt="Image-HasTech">
                                        <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                            </div>
                            <div class="working-col">
                                <div class="working-process-item">
                                    <div class="icon-box">
                                        <div class="inner">
                                            <img class="icon-img" src="assets/img/icons/w3.png" alt="Image-HasTech">
                                            <img class="icon-hover" src="assets/img/icons/w3-hover.png"
                                                alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Find Your Job</h4>
                                        <p class="desc">It is long established fact reader distracted readable
                                            content</p>
                                    </div>
                                    <div class="shape-arrow-icon">
                                        <img class="shape-icon" src="assets/img/icons/right-arrow.png"
                                            alt="Image-HasTech">
                                        <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                            </div>
                            <div class="working-col">
                                <div class="working-process-item">
                                    <div class="icon-box">
                                        <div class="inner">
                                            <img class="icon-img" src="assets/img/icons/w4.png" alt="Image-HasTech">
                                            <img class="icon-hover" src="assets/img/icons/w4-hover.png"
                                                alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Save & Apply</h4>
                                        <p class="desc">It is long established fact reader distracted readable
                                            content</p>
                                    </div>
                                    <div class="shape-arrow-icon d-none">
                                        <img class="shape-icon" src="assets/img/icons/right-arrow.png"
                                            alt="Image-HasTech">
                                        <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if (Auth::user() && Auth::user()->role == 'employers')
        <section class="team-area">
            <div class="container" data-aos="fade-down">
                <div class="row">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center">
                                <h3 class="title">Best Candidate</h3>
                                <div class="desc">
                                    <p>Many desktop publishing packages and web page editors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($candidates as $candidate)
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="team-item">
                                    <div class="thumb">
                                        <a href="candidate-details.html">
                                            <img src="{{ asset('storage/user_profile/' . $candidate->user_profile) }}"
                                                width="160" height="160" alt="User Profile Image">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="{{ $candidate->name }}"></a></h4>
                                        <h5 class="sub-title">{{ $candidate->designation }}</h5>
                                        <div class="rating-box">
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                            <i class="icofont-star"></i>
                                        </div>
                                        <p class="desc">CSS3, HTML5, Javascript Bootstrap, Jquery</p>
                                        <a class="btn-theme btn-white btn-sm"
                                            href="{{ route('candidate.details', $candidate->id) }}">View Profile</a>
                                    </div>
                                    <div class="bookmark-icon"><img src="assets/img/icons/bookmark1.png"
                                            alt="Image-HasTech">
                                    </div>
                                    <div class="bookmark-icon-hover"><img src="assets/img/icons/bookmark2.png"
                                            alt="Image-HasTech"></div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

        </section>
    @endif
    </main>
    </div>
@endsection('content')
