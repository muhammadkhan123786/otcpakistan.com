@extends('dashboard.layouts.main')
@push('title')
  <title> Update Deparment. </title>
@endpush

@section('main-content')
<div style="padding-top: 50px;" class="container">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Department</h4>
            <p class="card-description">
               Update the details of Department.
            </p>
            <form method="POST" action="{{route('school-department.update',$department->school_department_id)}}" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{session()->get('message') }}
                    </div>
                @endif

              <div class="form-group">
                <label for="sessionName">Department Name</label>
                <input type="text" class="form-control" id="departmentName" name="departmentName" placeholder="Enter department Name." required value="{{old('departmentName',$department->school_department_name)}}">
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" id='departmentIsactive' name="departmentIsactive" {{ old('departmentIsactive',$department->school_department_isActive) == '1' ? 'checked' : '' }}>
                   Is the department active?
                </label>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a class="btn btn-danger" href="{{route('school-department.index')}}">Cancel</a>
            </form>
          </div>
        </div>
</div>
</div>

@endsection


@push('scripts')

@endpush
