
@extends('dashboard.layouts.main')
@push('title')
  <title> Dasboard Home. </title>
@endpush

@section('main-content')
@push('page-name')
<h5 style="padding-top: 20px; color:black">You are at Dashboard Home. </h5>
@endpush
@if (\Auth::user()->role_id==1)
<div style="width: auto; border-radius:5px; border: 15px solid green; padding: 50px; margin: 20px; padding-top: 20px;">

    <h1>Hi {{\Auth::user()->name}},</h1>
    <h3 style="padding-top: 10px">Welcome to the OTC Family! </h3>
    <img src="{{url('images/homepageimages/14.png')}}" alt="Icon" width="auto" height="150px" >
    <p style="margin-top: 20px">
        I'm super excited to have you reading.
    </p>
    <p>
        You are now part of a growing community of OTC Pakistan.
    </p>
    <p>
        We will continue call you (unless you decide to unsubscribe!) to keep you updated on all the latest and greatest news.

    </p>
    <p>
        See you soon!
    </p>
    <p>
        If you need any help, don't hesitate to call us!
    </p>
    <p>
        Regards
    </p>
   <p>
      OTC Pakistan.<br/>
      Office: The London School of Education. E/2/4 257 Gulistan colony Main Walton Road, Lahore. <br/>
      Contact#: <h4>0333 4123 049.</h4>

   </p>


  </div>
  @elseif(\Auth::user()->role_id==3)
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Welcome, {{Session::get('user_details')['schoolName']}}</h3>
              <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
            </div>
            <div class="col-12 col-xl-4">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                 <i class="mdi mdi-calendar"></i> Today: ({{now()->format('l')}}) ({{now()->format('d, F, Y')}})
                </button>

              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-people mt-auto">
              <img src="{{ asset("dashboardstyles/images/dashboard/people.svg")}}" alt="people">
              <div class="weather-info">
                <div class="d-flex">
                  <div>
                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                  </div>
                  <div class="ml-2">
                    <h4 class="location font-weight-normal">Pakistan</h4>
                    <h6 class="font-weight-normal">Lahore.</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
          <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">Total Students</p>
                  <p class="fs-30 mb-2">4006</p>
                  <p>10.00% (30 days)</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Total Present</p>
                  <p class="fs-30 mb-2">61344</p>
                  <p>22.00% (30 days)</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
              <div class="card card-light-blue">
                <div class="card-body">
                  <p class="mb-4">Today follow up calls</p>
                  <p class="fs-30 mb-2">34040</p>
                  <p>2.00% (30 days)</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body">
                  <p class="mb-4"> Today total fee collection</p>
                  <p class="fs-30 mb-2">47033</p>
                  <p>0.22% (30 days)</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endif

@endsection



