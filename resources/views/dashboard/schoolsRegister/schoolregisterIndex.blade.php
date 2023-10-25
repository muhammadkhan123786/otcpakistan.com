@extends('dashboard.layouts.main')
@push('title')
  <title> School registeration Index. </title>
@endpush
@section('main-content')
@push('page-name')
<h5 style="padding-top: 20px; color:black">You are at school register Index. </h5>
@endpush

<div style="padding-top: 50px;" class="container">
    <div style="padding-bottom: 30px;">
       <a href="{{route('SchoolRegisteration.add')}}" class="btn btn-primary">+ Register School</a>
    </div>
    <div class='col-md-6'>
        <div class='form-group'>
          <form action="{{route('SchoolRegisteration.index')}}" method="GET">
              <label for="search" class="sr-only">
                  Search School
              </label>
              <input type="text" name="search"
                  class="form-control"
                  placeholder="Enter school name to search."
                  /> <br/>
                <button type="submit" class='btn btn-primary'> Search </button>

          </form>
        </div>
        @if($search=='')

            You searched nothing.

        @else{
          You searched for <label class='font-italic font-weight-bold'>{{$search}}</label>
        }
        @endif

     </div>
    @if(session()->has('message'))
                    <div class="alert alert-success">
                       {{session()->get('message') }}
                    </div>
        @endif
    @if($schools->count()>0)
    <table class="table table-bordered table-responsive">
        <thead>
          <tr>
            <th scope="col">Sr. #</th>
            <th scope="col">School Name </th>
            <th scope="col">School address </th>
            <th scope="col"> Total Students </th>
            <th scope="col"> Actions </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($schools as $school)
          <tr>
            <th scope="row">{{$school->school_id}}</th>
            <td>{{$school->school_name}}</td>
            <td>{{$school->school_address}}</td>
            <td> 0 </td>

            <td>
                    <a class="btn btn-danger" onclick="deleteGroup({{$school->school_id}},'{{$school->school_name}}')">Delete</a> |

                    <a class="btn btn-primary" href="#" > Edit </a>|

                    <a class="btn btn-success" href="#" > Change password </a>




            </td>
          </tr>
          @endforeach


        </tbody>
      </table>
      {{$schools->withQueryString()->links()}}
    @else
        <h2> You have not added any students. </h2>

    @endif

</div>


@endsection
@push('scripts')
<script type="text/javascript">
function deleteGroup($id,$schoolName) {
    if (confirm("Are you sure you want to delete this school ? "+$schoolName)) {
        var url = "{{ route('school.destroy', ":id") }}";
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
