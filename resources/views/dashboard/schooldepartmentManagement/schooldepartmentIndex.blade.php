@extends('dashboard.layouts.main')

@push('title')
  <title> {{Session::get('user_details')['schoolName']}} Department Index. </title>
@endpush

@section('main-content')
<div style="padding-top: 50px;" class="container">
    <div class='row py-2'>
        <div class='col-md-4'>
           <div style="padding-bottom: 30px;">
               <a href="{{route('school-department.add')}}" class="btn btn-primary">+ Add New Department</a>
           </div>
        </div>
        <div class='col-md-4'>
           <div class='form-group'>
             <form action="{{ route('school-department.index') }}" method="GET">
                 <label for="search" class="sr-only">
                     Enter Department Name
                 </label>
                 <input type="text" name="search"
                     class="form-control"
                     placeholder="Search the department."
                     />
           </div>
           @if($search=='')

               You searched nothing.

           @else{
             You searched for <label class='font-italic font-weight-bold'>{{$search}}</label>
           }
           @endif

        </div>
          <div class="col-md-4">
           <button type="submit" class='btn btn-primary'> Search </button>
          </div>
       </form>
       </div>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message') }}
            </div>
        @endif
        @if($schooldepartments->count()>0)
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">{{Session::get('user_details')['schoolName']}} Departments.</p>
                <div class="row">
                  <div class="col-12">
                    <div class="table table-bordered table-responsive">
                      <table class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th>Sr. #</th>
                            <th> Department Name </th>
                            <th> Department Status</th>
                            <th> Actions </th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ( $schooldepartments as $department )
                            <tr>
                                <td> {{$department->school_department_id}} </td>
                                <td> {{$department->school_department_name}} </td>
                                <td class="font-weight-medium">
                                    @if($department->school_department_isActive)

                                        <div class="badge badge-success">Active</div>

                                    @else
                                        <div class="badge badge-danger">In Active</div>

                                    @endif

                                <td class='embed-responsive'>
                                    <a class="btn btn-primary" href="{{route('school-department.edit',$department->school_department_id)}}" >Edit</a>|
                                    <a class="btn btn-danger" onclick="deleteDepartment({{$department->school_department_id}},'{{$department->school_department_name}}')">Delete</a>|

                                </td>

                            </tr>

                           @endforeach
                        </tbody>
                    </table>
                    <div style="padding-top: 10px">
                        {!! $schooldepartments->links() !!}
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>

        @else
        <h2>No any departments exists. </h2>

        @endif
    </div>

@endsection
@push('scripts')
<script type="text/javascript">
    function deleteDepartment($departmentId,$departmentName) {
        console.log('delete department.');
        if (confirm("Are you sure you want to delete this department ? "+$departmentName)) {
            var url = "{{route('school-department.destroy', ":departmentId") }}";
            url = url.replace(':departmentId', $departmentId);
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

