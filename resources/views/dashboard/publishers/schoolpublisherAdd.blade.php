@extends('dashboard.layouts.main')
@push('title')
  <title> Add New Publisher. </title>
@endpush

@section('main-content')
<div style="padding-top: 50px;" class="container">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add New Publisher.</h4>
            <p class="card-description">
               Enter the details of publisher.
            </p>
            <form method="POST" action="{{route('school-publisher.store')}}" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{session()->get('message') }}
                    </div>
                @endif


              <div class="form-group">
                <label for="publisherName">Publisher Name</label>
                <input type="text" class="form-control" id="publisherName" name="publisherName" placeholder="Enter publisher Name." required value="{{old('publisherName')}}">
              </div>
              <div class="form-group">
                <label for="publisherContactNumber">Publisher Contact Number</label>
                <input type="text" class="form-control" id="publisherContactNumber" name="publisherContactNumber" placeholder="Enter publisher contact number." required value="{{old('publisherContactNumber')}}">
              </div>
              <div class="form-group">
                <label for="publisherwhatsappNumber">Publisher Whatsapp Number</label>
                <input type="text" class="form-control" id="publisherwhatsappNumber" name="publisherwhatsappNumber" placeholder="Enter publisher whatsapp number." value="{{old('publisherwhatsappNumber')}}">
              </div>
              <div class="form-group">
                <label for="publisheremail">Publisher email Id</label>
                <input type="text" class="form-control" id="publisheremail" name="publisheremail" placeholder="Enter publisher email." value="{{old('publisheremail')}}">
              </div>
              <div class="form-group">
                <label for="publisherwebsite">Publisher Website</label>
                <input type="text" class="form-control" id="publisherwebsite" name="publisherwebsite" placeholder="Enter publisher website." value="{{old('publisherwebsite')}}">
              </div>

              <div class="form-group">
                <label for="publisheraddress"> Address </label>
                <textarea class="form-control" id="publisheraddress" name="publisheraddress" rows="4" required placeholder="Please enter publisher address." value="{{old("publisheraddress")}}"></textarea>
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" id='publisherIsactive' name="publisherIsactive" {{ old('publisherIsactive') == '1' ? 'checked' : '' }}>
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
