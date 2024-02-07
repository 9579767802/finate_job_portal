@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <main class="main-content">
            <section class="team-area team-inner2-area">
                <div class="container">
                    <div class="row">
                        @foreach ($candidates as $candidate)
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="team-item">
                                    <div class="thumb">
                                        {{-- @dd($candidate->user_profile); --}}

                                        <a href="{{ route('candidate.details', $candidate->id) }}">
                                            <img src="{{ asset('storage/user_profile/' . $candidate->user_profile) }}"
                                                width="160" height="160" alt="User Profile Image">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a
                                                href="{{ route('candidate.details', $candidate->id) }}">{{ $candidate->name }}</a>
                                        </h4>
                                        <h5 class="sub-title">{{ $candidate->designation }}</h5>

                                        <p class="desc">{{ $candidate->software_skill }}</p>
                                        <a class="btn-theme btn-white btn-sm"
                                            href="{{ route('candidate.details', $candidate->id) }}">View
                                            Profile</a>
                                    </div>
                                    <div class="bookmark-icon"><img src="assets/img/icons/bookmark1.png"
                                            alt="Image-HasTech"></div>
                                    <div class="bookmark-icon-hover"><img src="assets/img/icons/bookmark2.png"
                                            alt="Image-HasTech"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="pagination-area">
                            {{ $candidates->links() }}
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <div id="scroll-to-top" class="scroll-to-top"><span class="icofont-rounded-up"></span></div>
    </div>
@endsection
