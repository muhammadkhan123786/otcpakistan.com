@extends('dashboard.layouts.main')
@push('title')
  <title> Add New Session. </title>
@endpush

@section('main-content')
<div style="padding-top: 50px;" class="container">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add New Session</h4>
            <p class="card-description">
               Enter the details of session.
            </p>
            <form method="POST" action="{{route('school-session.store')}}" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{session()->get('message') }}
                    </div>
                @endif

              <div class="form-group">
                <label for="sessionName">Session Name</label>
                <input type="text" class="form-control" id="SessionName" name="SessionName" placeholder="Enter Session Name." required value="{{old('SessionName')}}">
              </div>
              <div class="form-group">
                <label for="sessionstartdate">Session Start Date</label>
                <input type="date" class="form-control" id="sessionstartdate" name="sessionstartdate" placeholder="Please select session start date." required value="{{old('sessionstartdate')}}">
              </div>
              <div class="form-group">
                <label for="sessionenddate">Session End Date</label>
                <input type="date" class="form-control" id="sessionenddate" name="sessionenddate" placeholder="Please select session end date." required value="{{old('sessionenddate')}}">
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" id='sessionIsactive' name="sessionIsactive" {{ old('sessionIsactive') == 'on' ? 'checked' : '' }}>
                   Is the session active?
                </label>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a class="btn btn-danger" href="{{route('school-session.index')}}">Cancel</a>
            </form>
          </div>
        </div>
</div>
</div>

@endsection


@push('scripts')

@endpush
