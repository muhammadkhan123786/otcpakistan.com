@extends('dashboard.layouts.main')
@push('title')
  <title> Add New class. </title>
@endpush

@section('main-content')
<div style="padding-top: 50px;" class="container">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add New class.</h4>
            <p class="card-description">
               Enter the details of class.
            </p>
            <form method="POST" action="{{route('school-class.store')}}" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{session()->get('message') }}
                    </div>
                @endif

              <div class="form-group">
                <label for="sessionName">class Name</label>
                <input type="text" class="form-control" id="className" name="className" placeholder="Enter Class Name." required value="{{old('className')}}">
              </div>
              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" id='classIsactive' name="classIsactive" {{ old('classIsactive') == '1' ? 'checked' : '' }}>
                    Is the session active?
                </label>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a class="btn btn-danger" href="{{route('school-class.index')}}">Cancel</a>
            </form>
          </div>
        </div>
</div>
</div>

@endsection


@push('scripts')

@endpush
