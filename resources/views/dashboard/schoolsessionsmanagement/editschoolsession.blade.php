@extends('dashboard.layouts.main')
@push('title')
  <title> Edit Session. </title>
@endpush

@section('main-content')
<div style="padding-top: 50px;" class="container">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Session</h4>
            <p class="card-description">
               Update the details of session.
            </p>
            <form method="POST" action="{{route('school-session.update',$Session->school_sessions_id)}}" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{session()->get('message') }}
                    </div>
                @endif

              <div class="form-group">
                <label for="sessionName">Session Name</label>
                <input type="text" class="form-control" id="SessionName" name="SessionName" placeholder="Enter Session Name." required value="{{old('SessionName',$Session->school_session_name)}}">
              </div>
              <div class="form-group">
                <label for="sessionstartdate">Session Start Date</label>
                <input type="date" class="form-control" id="sessionstartdate" name="sessionstartdate" placeholder="Please select session start date." required value="{{old('sessionstartdate',$Session->school_session_startDate)}}">
              </div>
              <div class="form-group">
                <label for="sessionenddate">Session End Date</label>
                <input type="date" class="form-control" id="sessionenddate" name="sessionenddate" placeholder="Please select session end date." required value="{{old('sessionenddate',$Session->school_session_endDate)}}">
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" id='sessionIsactive' name="sessionIsactive" {{ old('sessionIsactive',$Session->school_session_isActive) == '1' ? 'checked' : '' }}>
                   Is the session active?
                </label>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Update</button>
              <a class="btn btn-danger" href="{{route('school-session.index')}}">Cancel</a>
            </form>
          </div>
        </div>
</div>
</div>

@endsection


@push('scripts')

@endpush
