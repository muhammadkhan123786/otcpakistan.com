@extends('dashboard.layouts.main')
@push('title')
  <title> Session Details. </title>
@endpush

@section('main-content')
<div class='container'>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card position-relative">
        <div class="card-body">
            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                <div class="ml-xl-4 mt-3">
                                    <p>Session</p>
                                    <p class="card-title">  {{$Session->school_session_name}} Details.</p>
                                    <h1 class="text-primary"> 34040 </h1>
                                    <h3 class="font-weight-500 mb-xl-4 text-primary"> Total Students. </h3>
                                    <p class="mb-2 mb-xl-0">The total number of students within the date range. It is the period time a student is actively engaged with your school to study.</p>
                          </div>
                            </div>
                            <div class="col-md-12 col-xl-9">
                                <div class="row">
                                    <div class="col-md-12 border-right">
                                        <div class="table-responsive table mb-3 mb-md-0 mt-3">
                                            <table class="table table-bordered report-table">
                                                <thead>
                                                    <th class="text-muted">
                                                        Class
                                                    </th>
                                                    <th class="text-muted">
                                                        Report
                                                    </th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                       <td>Play Group</td>
                                                       <td class="w-100 px-0">
                                                        <div class="progress progress-md mx-4">
                                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div><br/>
                                                        <h5 style="padding-left: 30px">Total Inquiries: 150</h5> <br/>
                                                        <h5 style="padding-left: 30px">Total Enrolled: 100</h5> <br/>
                                                        <h5 style="padding-left: 30px">Total Left: 50</h5>
                                                      </td>
                                                    </tr>
                                                <tr>
                                                        <td>Nursery</td>
                                                        <td class="w-100 px-0">
                                                         <div class="progress progress-md mx-4">
                                                           <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                         </div><br/>
                                                         <h5 style="padding-left: 30px">Total Inquiries: 150</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Enrolled: 100</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Left: 50</h5>
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Prep</td>
                                                        <td class="w-100 px-0">
                                                         <div class="progress progress-md mx-4">
                                                           <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                         </div><br/>
                                                         <h5 style="padding-left: 30px">Total Inquiries: 150</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Enrolled: 100</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Left: 50</h5>
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <td>One</td>
                                                        <td class="w-100 px-0">
                                                         <div class="progress progress-md mx-4">
                                                           <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                         </div><br/>
                                                         <h5 style="padding-left: 30px">Total Inquiries: 150</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Enrolled: 100</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Left: 50</h5>
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Two</td>
                                                        <td class="w-100 px-0">
                                                         <div class="progress progress-md mx-4">
                                                           <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                         </div><br/>
                                                         <h5 style="padding-left: 30px">Total Inquiries: 150</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Enrolled: 100</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Left: 50</h5>
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Three</td>
                                                        <td class="w-100 px-0">
                                                         <div class="progress progress-md mx-4">
                                                           <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                         </div><br/>
                                                         <h5 style="padding-left: 30px">Total Inquiries: 150</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Enrolled: 100</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Left: 50</h5>
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Four</td>
                                                        <td class="w-100 px-0">
                                                         <div class="progress progress-md mx-4">
                                                           <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                         </div><br/>
                                                         <h5 style="padding-left: 30px">Total Inquiries: 150</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Enrolled: 100</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Left: 50</h5>
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Five</td>
                                                        <td class="w-100 px-0">
                                                         <div class="progress progress-md mx-4">
                                                           <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                         </div><br/>
                                                         <h5 style="padding-left: 30px">Total Inquiries: 150</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Enrolled: 100</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Left: 50</h5>
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Six</td>
                                                        <td class="w-100 px-0">
                                                         <div class="progress progress-md mx-4">
                                                           <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                         </div><br/>
                                                         <h5 style="padding-left: 30px">Total Inquiries: 150</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Enrolled: 100</h5> <br/>
                                                         <h5 style="padding-left: 30px">Total Left: 50</h5>
                                                       </td>
                                                    </tr>
                                                </tbody>




                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection

