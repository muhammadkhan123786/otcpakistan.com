@extends('dashboard.layouts.main')
@push('title')
  <title> Update Publisher. </title>
@endpush

@section('main-content')
<div class="container">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Publisher.</h4>
            <p class="card-description">
               Update the publisher.
            </p>
            <form method="POST" action="{{route('school-publisher.update',$publisher->school_publisher_id)}}" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{session()->get('message') }}
                    </div>
                @endif

              <div class="form-group">
                <label for="publisherName">Publisher Name</label>
                <input type="text" class="form-control" id="publisherName" name="publisherName" placeholder="Enter publisher Name." required value="{{old('publisherName',$publisher->school_publisher_name)}}">
              </div>

              <div class="form-group">
                <label for="publisherContactNumber">Publisher Contact Number</label>
                <input type="text" class="form-control" id="publisherContactNumber" name="publisherContactNumber" placeholder="Enter publisher contact number." required value="{{old('publisherContactNumber',$publisher->school_publisher_contact_number)}}">
              </div>

              <div class="form-group">
                <label for="publisherwhatsappNumber">Publisher Whatsapp Number</label>
                <input type="text" class="form-control" id="publisherwhatsappNumber" name="publisherwhatsappNumber" placeholder="Enter publisher whatsapp number." value="{{old('publisherwhatsappNumber',$publisher->school_publisher_whatsapp_number)}}">
              </div>

              <div class="form-group">
                <label for="publisheremail">Publisher email Id</label>
                <input type="email" class="form-control" id="publisherEmail" name="publisherEmail" placeholder="Enter publisher email."  value="{{old('publisherEmail',$publisher->school_publisher_email_id)}}">
              </div>

              <div class="form-group">
                <label for="publisherwebsite">Publisher Website</label>
                <input type="text" class="form-control" id="publisherwebsite" name="publisherwebsite" placeholder="Enter publisher website." value="{{old('publisherwebsite',$publisher->school_publisher_website)}}">
              </div>

              <div class="form-group">
                <label for="publisheraddress"> Address </label>
                <input type="text" class="form-control" id="publisheraddress" name="publisheraddress" rows="4" required placeholder="Please enter publisher address." value="{{old("publisheraddress",$publisher->school_publisher_address)}}"></input>
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" id='publisherIsactive' name="publisherIsactive" {{ old('publisherIsactive',$publisher->school_publisher_isActive) == '1' ? 'checked' : '' }}>
                    Is the publisher active?
                </label>
              </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a class="btn btn-danger" href="{{route('school-publisher.index')}}">Cancel</a>
            </form>
          </div>
        </div>
</div>
</div>

@endsection


@push('scripts')

@endpush
