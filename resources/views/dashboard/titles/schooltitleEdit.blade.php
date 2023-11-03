@extends('dashboard.layouts.main')
@push('title')
  <title> Edit Title. </title>
@endpush

@section('main-content')
<div style="padding-top: 50px;" class="container">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Title</h4>
            <p class="card-description">
               Enter the details of Title.
            </p>
            <form method="POST" action="{{route('school-title.update',$title->school_titles_id)}}" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{session()->get('message') }}
                    </div>
                @endif

              <div class="form-group">
                <label for="sessionName">Title Name</label>
                <input type="text" class="form-control" id="titleName" name="titleName" placeholder="Enter Title Name." required value="{{old('titleName',$title->school_title_name)}}">
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" id='titleIsactive' name="titleIsactive" {{ old('titleIsactive',$title->school_titles_isActive) == '1' ? 'checked' : '' }}>
                   Is the title active?
                </label>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a class="btn btn-danger" href="{{route('school-title.index')}}">Cancel</a>
            </form>
          </div>
        </div>
</div>
</div>

@endsection


@push('scripts')

@endpush
