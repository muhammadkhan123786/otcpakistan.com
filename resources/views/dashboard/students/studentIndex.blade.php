@extends('dashboard.layouts.main')
@push('title')
  <title> Student Index. </title>
@endpush
@section('main-content')
@push('page-name')
<h5 style="padding-top: 20px; color:black">You are at My Student Index. </h5>
@endpush

<div style="padding-top: 50px;" class="container">
    <div style="padding-bottom: 30px;">
       <a href="{{route('student.add')}}" class="btn btn-primary">+ Add Student</a>
    </div>
    @if(session()->has('message'))
                    <div class="alert alert-success">
                       {{session()->get('message') }}
                    </div>
        @endif
    @if($students->count()>0)
    <table class="table table-bordered table-responsive">
        <thead>
          <tr>
            <th scope="col">Sr. #</th>
            <th scope="col">Student Name </th>
            <th scope="col">Student Class </th>
            <th scope="col">School Name</th>
            <th scope="col"> School Address </th>
            <th scope="col"> Actions </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
          <tr>
            <th scope="row">{{$student->student_id}}</th>
            <td>{{$student->student_name}}</td>
            <td>{{$student->student_class->class_name}}</td>
            <td>{{$student->student_school->school_name}}</td>
            <td>{{$student->student_school->school_address}}</td>
            <td>


                    <a class="btn btn-danger" onclick="deleteGroup({{$student->student_id}},'{{$student->student_name}}')">Delete</a> |

                    <a class="btn btn-primary" href="{{route('student.Edit',$student->student_id)}}" >Edit</a>


            </td>
          </tr>
          @endforeach


        </tbody>
      </table>
    @else
        <h2> You have not added any students. </h2>

    @endif

</div>


@endsection
@push('scripts')
<script type="text/javascript">
function deleteGroup($id,$studentName) {
    if (confirm("Are you sure you want to delete this Student ? "+$studentName)) {
        var url = "{{ route('student.destroy', ":id") }}";
        url = url.replace(':id', $id);
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
