@extends('dashboard.layouts.main')

@push('title')
  <title>{{Session::get('user_details')['schoolName']}} School Publisher Index. </title>
@endpush

@section('main-content')
<body>
<div style="padding-top: 25px;" class="container">
    <div class='row py-2'>
     <div class='col-md-4'>
        <div style="padding-bottom: 30px;">
            <a href="{{route('school-publisher.add')}}" class="btn btn-primary">+ Add New Publisher</a>
        </div>
     </div>
     <div class='col-md-4'>
        <div class='form-group'>
          <form action="{{route('school-publisher.index') }}" method="GET">
              <label for="search" class="sr-only">
                  Enter Publisher Name
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
        @if($publishers->count()>0)
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title"> {{Session::get('user_details')['schoolName']}} School Publisher. </p>
                <div class="row">
                  <div class="col-12">
                    <div class="table table-bordered table-responsive">
                      <table class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th> Sr. # </th>
                            <th> Publisher Name </th>
                            <th> Contact #  </th>
                            <th> Address</th>
                            <th> Status  </th>
                            <th> Total Books  </th>
                            <th> Actions </th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ( $publishers as $publisher )
                            <tr>
                                <td> {{$publisher->school_publisher_id}} </td>
                                <td> {{$publisher->school_publisher_name}} </td>
                                <td> {{$publisher->school_publisher_contact_number}} </td>
                                <td> {{$publisher->school_publisher_address}} </td>

                                <td class="font-weight-medium">
                                    @if($publisher->school_publisher_isActive)

                                        <div class="badge badge-success">Active</div>

                                    @else
                                        <div class="badge badge-danger">In Active</div>

                                    @endif
                                    <td> 100 </td>
                                <td class='embed-responsive'>
                                    <a class="btn btn-primary" href="{{route("school-publisher.edit",$publisher->school_publisher_id)}}" >Edit</a>|
                                    <a class="btn btn-danger" onclick="deletePublisher({{$publisher->school_publisher_id}},'{{$publisher->school_publisher_name}}')">Delete</a>|
                                    <a class="btn btn-success" href="{{route('school-publisher.details',$publisher->school_publisher_id)}}">Details</a>

                                </td>

                            </tr>

                           @endforeach
                        </tbody>
                    </table>
                  <div style="padding-top: 10px">
                    {!! $publishers->links() !!}
                  </div>

                    </div>

                  </div>


                </div>
                </div>

              </div>
            </div>


          </div>


        @else
        <h2>No any Publisher exists. </h2>

        @endif
    </div>
  </body>
@endsection
@push('scripts')
<script type="text/javascript">
    function deletePublisher($publisherId,$publisherName) {
        if (confirm("Are you sure you want to delete this publisher ? "+$publisherName)) {
            var url = "{{ route('school-publisher.destroy', ":publisherId") }}";
            url = url.replace(':publisherId', $publisherId);
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

