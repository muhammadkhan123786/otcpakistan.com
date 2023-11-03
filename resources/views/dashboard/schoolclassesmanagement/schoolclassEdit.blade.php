@extends('dashboard.layouts.main')

@push('title')
  <title> Edit Class. </title>
@endpush

@section('main-content')
<div style="padding-top: 50px;" class="container">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Class</h4>
            <p class="card-description">
               Update the details of class.
            </p>
            <form method="POST" action="{{route('school-class.update',$class->school_class_id)}}" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{session()->get('message') }}
                    </div>
                @endif

              <div class="form-group">
                <label for="className"> Class Name </label>
                <input type="text" class="form-control" id="className" name="className" placeholder="Enter class Name." required value="{{old('className',$class->school_class_name)}}">
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" id='classIsactive' name="classIsactive" {{ old('classIsactive',$class->school_class_isActive) == '1' ? 'checked' : '' }}>
                   Is the class active?
                </label>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Update</button>
              <a class="btn btn-danger" href="{{route('school-class.index')}}">Cancel</a>
            </form>
          </div>
        </div>
</div>
</div>

@endsection


@push('scripts')

@endpush
