@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="job-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="job-details-wrap">
                            <div class="job-details-info">
                                <div class="thumb">
                                    <img src="{{ asset('storage/company_logos/' . $job->employerDetails->logo) }}"
                                         width="160" height="160" alt="User Profile Image">
                                 </div>
                                 <div class="content">
                                     <h4 class="title">{{ $job->title }}</h4>
                                     <h5 class="sub-title">{{ $job->employerDetails->name }}</h5>
                                     <ul class="info-list">
                                         <li><i class="icofont-location-pin"></i> {{ $job->address }}</li>
                                         <li><i class="icofont-phone"></i>{{ $job->employerDetails->contact_number }}
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="job-details-price">
                                 <h4 class="title">{{ $job->salary }} <span>/monthly</span></h4>
                                 <form method="POST" action="{{ route('apply', ['jobId' => $job->id]) }}">
                                     @csrf
                                     <button type="submit" class="btn-theme btn-sm">Apply Now</button>
                                 </form>
                             </div>
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
                                 {!! $job->page !!}
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
                     <div class="job-sidebar">
                         <div class="widget-item">
                             <div class="widget-title">
                                 <h3 class="title">Summery</h3>
                             </div>
                             <div class="summery-info">
                                 <table class="table">
                                     <tbody>
                                         <tr>
                                             <td class="table-name">Job Type</td>
                                             <td class="dotted">:</td>
                                             <td data-text-color="#03a84e">{{ $job->job_type }}</td>
                                         </tr>
                                         <tr>
                                             <td class="table-name">Category</td>
                                             <td class="dotted">:</td>
                                             <td>{{ $job->category }}</td>
                                         </tr>
                                         <tr>
                                             <td class="table-name">Posted</td>
                                             <td class="dotted">:</td>
                                             <td>{{ $job->posted_date }}</td>
                                         </tr>
                                         <tr>
                                             <td class="table-name">Salary</td>
                                             <td class="dotted">:</td>
                                             <td>{{ $job->salary }}</td>
                                         </tr>
                                         <tr>
                                             <td class="table-name">Experience</td>
                                             <td class="dotted">:</td>
                                             <td>{{ $job->experience }}</td>
                                         </tr>
                                         <tr>
                                             <td class="table-name">Gender</td>
                                             <td class="dotted">:</td>
                                             <td>{{ $job->gender }}</td>
                                         </tr>
                                         <tr>
                                             <td class="table-name">Qualification</td>
                                             <td class="dotted">:</td>
                                             <td>{{ $job->qualification }}</td>
                                         </tr>
                                         <tr>
                                             <td class="table-name">Level</td>
                                             <td class="dotted">:</td>
                                             <td>{{ $job->level }}</td>
                                         </tr>

                                         <tr>
                                             <td class="table-name">Application End</td>
                                             <td class="dotted">:</td>
                                             <td data-text-color="#ff6000">{{ $job->application_end_date }}</td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
            </div>
        </section>
    </div>
@endsection
