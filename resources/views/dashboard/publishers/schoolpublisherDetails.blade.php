@extends('dashboard.layouts.main')
@push('title')
  <title> {{$publisher->school_publisher_name}} Publisher. </title>
@endpush

@section('main-content')
<div class="container">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"> {{$publisher->school_publisher_name}} Publisher.</h4>
            <h5>Total Books: 100</h5>
            <p class="card-description">
               Details of {{$publisher->school_publisher_name}}.
            </p>


              <div class="form-group">
                <p style="font-weight: bold">Publisher Name</p>
                <label>{{$publisher->school_publisher_name}}</label>

              </div>
              <div class="form-group">
                <p style="font-weight: bold">Publisher Contact Number</p>
                <label>{{$publisher->school_publisher_contact_number}}</label>
              </div>
              <div class="form-group">
                <p style="font-weight: bold">Publisher Whatsapp Number</p>
                <label>{{$publisher->school_publisher_whatsapp_number}}</label>
              </div>
              <div class="form-group">
                <p style="font-weight: bold">Publisher email Id</p>
                <label>{{$publisher->school_publisher_email_id}}</label>
              </div>
              <div class="form-group">
                <p style="font-weight: bold">Publisher Website</p>
                <label>{{$publisher->school_publisher_website}}</label>
              </div>

              <div class="form-group">
                <p style="font-weight: bold"> Address </p>
                <label>{{$publisher->school_publisher_address}}</label>
              </div>

              <div class="form-check form-check-flat form-check-primary">
                @if($publisher->school_publisher_isActive)
                    <div class="badge badge-success">Active</div>
                @else
                     <div class="badge badge-danger">In Active</div>
               @endif
              </div>
              <a class="btn btn-primary" href="{{route('school-publisher.edit',$publisher->school_publisher_id)}}">Edit</a>
              <a class="btn btn-danger" href="{{route('school-publisher.index')}}">Back</a>

          </div>
        </div>
</div>
</div>

@endsection


@push('scripts')

@endpush
