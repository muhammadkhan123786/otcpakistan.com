@extends('dashboard.layouts.main')

@push('title')
  <title>{{Session::get('user_details')['schoolName']}} School Class Index. </title>
@endpush

@section('main-content')
<body>
<div style="padding-top: 50px;" class="container">
    <div class='row py-2'>
     <div class='col-md-4'>
        <div style="padding-bottom: 30px;">
            <a href="{{route('school-class.add')}}" class="btn btn-primary">+ Add New Class</a>
        </div>
     </div>
     <div class='col-md-4'>
        <div class='form-group'>
          <form action="{{ route('school-class.index') }}" method="GET">
              <label for="search" class="sr-only">
                  Enter Class Name
              </label>
              <input type="text" name="search"
                  class="form-control"
                  placeholder="Search..."
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
        @if($classes->count()>0)
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title"> {{Session::get('user_details')['schoolName']}} School Classes </p>
                <div class="row">
                  <div class="col-12">
                    <div class="table table-bordered table-responsive">
                      <table class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th>Sr. #</th>
                            <th> Class Name </th>
                            <th> Fee Collections </th>
                            <th> Active Students </th>

                            <th> Is session Active? </th>
                            <th> Actions </th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ( $classes as $class )
                            <tr>
                                <td> {{$class->school_class_id}} </td>
                                <td> {{$class->school_class_name}} </td>
                                <td> 1000. </td>
                                <td> 100 Students. </td>
                                <td class="font-weight-medium">
                                    @if($class->school_class_isActive)

                                        <div class="badge badge-success">Active</div>

                                    @else
                                        <div class="badge badge-danger">In Active</div>

                                    @endif

                                <td class='embed-responsive'>
                                    <a class="btn btn-primary" href="{{route('school-class.edit',$class->school_class_id)}}" >Edit</a>|
                                    <a class="btn btn-danger" onclick="deleteClass({{$class->school_class_id}},'{{$class->school_class_name}}')">Delete</a>

                                </td>

                            </tr>

                           @endforeach
                        </tbody>
                    </table>
                  <div style="padding-top: 10px">
                    {!! $classes->links() !!}
                  </div>

                    </div>

                  </div>


                </div>
                </div>

              </div>
            </div>


          </div>


        @else
        <h2>No any Class exists. </h2>

        @endif
    </div>
  </body>
@endsection
@push('scripts')
<script type="text/javascript">
    function deleteClass($classId,$className) {
        if (confirm("Are you sure you want to delete this class ? "+$className)) {
            var url = "{{ route('school-class.destroy', ":classId") }}";
            url = url.replace(':classId', $classId);
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

