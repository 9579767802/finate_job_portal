@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="team-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="team-details-wrap">
                            <div class="team-details-info">
                                <div class="thumb">
                                    <img src="{{ asset('storage/user_profile/' . $jobAppliedCandidate->user_profile) }}"
                                        width="130" height="130" alt="Image-HasTech">
                                </div>
                                <div class="content">
                                    <h4 class="title">{{ $jobAppliedCandidate->name }}</h4>
                                    <h5 class="sub-title">{{ $jobAppliedCandidate->designation }}</h5>
                                    <ul class="info-list">
                                        <li><i class="icofont-location-pin">{{ $jobAppliedCandidate->location }}</i></li>
                                        <li><i class="icofont-phone">{{ $jobAppliedCandidate->contact_number }}</i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-details-btn" data-candidate-id="{{ $jobAppliedCandidate->id }}">
                                <button type="button" class="btn-theme btn-light" id="shortlistBtn">Short List</button>

                                <a href="{{ route('candidate.downloadResume', $jobAppliedCandidate->id) }}"
                                    id="downloadResumeBtn" class="btn btn-outline-success">Download Resume</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-xl-8">
                        <div class="team-details-item">
                            <div class="content">
                                <h4 class="title">About Candidate</h4>
                                <p class="desc">
                                    {!! $jobAppliedCandidate->page !!}
                                </p>
                            </div>
                            <div class="candidate-details-wrap">

                            </div>
                        </div>
                        <div class="candidate-details-wrap">
                        </div>
                        <div class="content-list-wrap">
                            <div class="content mb--0">

                            </div>
                            <div class="content mb--0">
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-xl-4">
                        <div class="team-sidebar">
                            <div class="widget-item">
                                <div class="widget-title">
                                    <h3 class="title">Information</h3>
                                </div>
                                <div class="summery-info">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="table-name">Experience</td>
                                                <td class="dotted">:</td>
                                                <td>{{ $jobAppliedCandidate->experience }}</td>
                                            </tr>
                                            <tr>
                                                <td class="table-name">Language</td>
                                                <td class="dotted">:</td>
                                                <td>{{ $jobAppliedCandidate->language }}</td>
                                            </tr>
                                            <tr>
                                                <td class="table-name">Age</td>
                                                <td class="dotted">:</td>
                                                <td>{{ $jobAppliedCandidate->age }}</td>
                                            </tr>
                                            <tr>
                                                <td class="table-name">Gender</td>
                                                <td class="dotted">:</td>
                                                <td>{{ $jobAppliedCandidate->gender }}</td>
                                            </tr>
                                            <tr>
                                                <td class="table-name">Qualification</td>
                                                <td class="dotted">:</td>
                                                <td>{{ $jobAppliedCandidate->qualification }}</td>
                                            </tr>
                                            <tr>
                                                <td class="table-name">Level</td>
                                                <td class="dotted">:</td>
                                                <td>{{ $jobAppliedCandidate->level }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="widget-item">
                                <div class="widget-title">
                                    <h3 class="title">Share With</h3>
                                </div>
                                <div class="social-icons">
                                    <a href="https://www.facebook.com" target="_blank" rel="noopener"><i
                                            class="icofont-facebook"></i></a>
                                    <a href="https://twitter.com" target="_blank" rel="noopener"><i
                                            class="icofont-twitter"></i></a>
                                    <a href="https://www.skype.com" target="_blank" rel="noopener"><i
                                            class="icofont-skype"></i></a>
                                    <a href="https://www.pinterest.com" target="_blank" rel="noopener"><i
                                            class="icofont-pinterest"></i></a>
                                    <a href="https://dribbble.com/" target="_blank" rel="noopener"><i
                                            class="icofont-dribbble"></i></a>
                                </div>
                            </div>
                            <div class="widget-item widget-contact">
                                <div class="widget-title">
                                    <h3 class="title">Contact Now</h3>
                                </div>
                                <div class="widget-contact-form">
                                    <form id="contact-form" action="https://whizthemes.com/mail-php/raju/arden/mail.php"
                                        method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="con_name"
                                                        placeholder="Name:">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="email" name="con_email"
                                                        placeholder="Email:">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="con_message" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb--0">
                                                    <button class="btn-theme d-block w-100" type="submit">Send
                                                        Message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="form-message"></div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <div class="form-message"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
