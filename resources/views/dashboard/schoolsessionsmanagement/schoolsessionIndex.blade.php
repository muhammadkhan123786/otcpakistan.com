@extends('dashboard.layouts.main')

@push('title')
  <title> {{Session::get('user_details')['schoolName']}} Session Index. </title>
@endpush

@section('main-content')
<div style="padding-top: 50px;" class="container">
    <div style="padding-bottom: 30px;">
        <a href="{{route('school-session.add')}}" class="btn btn-primary">+ Add New Session</a>
     </div>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message') }}
            </div>
        @endif
        @if($sessions->count()>0)
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">{{Session::get('user_details')['schoolName']}} Sessions</p>
                <div class="row">
                  <div class="col-12">
                    <div class="table table-bordered table-responsive">
                      <table class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th>Sr. #</th>
                            <th> Session Name </th>
                            <th> Session Start Date</th>
                            <th> Session End Date </th>
                            <th> Total Students </th>
                            <th> Is session Active? </th>
                            <th> Actions </th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ( $sessions as $session )
                            <tr>
                                <td> {{$session->school_sessions_id}} </td>
                                <td> {{$session->school_session_name}} </td>

                                <td> {{\Carbon\Carbon::parse($session->school_session_startDate)->format('j F, Y') }} </td>
                                <td> {{ \Carbon\Carbon::parse($session->school_session_endDate)->format('j F, Y') }} </td>
                                <td> 100 Students. </td>
                                <td class="font-weight-medium">
                                    @if($session->school_session_isActive)

                                        <div class="badge badge-success">Active</div>

                                    @else
                                        <div class="badge badge-danger">In Active</div>

                                    @endif

                                <td class='embed-responsive'>
                                    <a class="btn btn-primary" href="{{route('school-session.Edit',$session->school_sessions_id)}}" >Edit</a>|
                                    <a class="btn btn-danger" onclick="deleteGroup({{$session->school_sessions_id}},'{{$session->school_session_name}}')">Delete</a>|
                                    <a class="btn btn-success" href="{{route('school-session.details',$session->school_sessions_id)}}">Details</a>

                                </td>

                            </tr>

                           @endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>

        @else
        <h2>No any Session exists. </h2>

        @endif
    </div>

@endsection
@push('scripts')
<script type="text/javascript">
    function deleteGroup($sessionId,$sessionName) {
        if (confirm("Are you sure you want to delete this session ? "+$sessionName)) {
            var url = "{{ route('school-session.destroy', ":sessionId") }}";
            url = url.replace(':sessionId', $sessionId);
            $.ajax({
                            type: "GET",
                            enctype: 'multipart/form-data',
                            url: url, //Your URL here
                            success: function (data) {
                                if (data.flag) {
                                    alert(data.message);
                                    location.reload();

                                } else {
                                    alert(data.message);
                                }
                            },
                            error: function (response) {
                                console.log(response);
                            }
                        });



        }
    }
    </script>


    @endpush

