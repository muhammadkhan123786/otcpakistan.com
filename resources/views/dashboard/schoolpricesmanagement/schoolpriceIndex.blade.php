@extends('dashboard.layouts.main')

@push('title')
  <title> {{Session::get('user_details')['schoolName']}} Price Management Index. </title>
@endpush

@section('main-content')
<div style="padding-top: 50px;" class="container">
    <div class='row py-2'>
        <div class='col-md-4'>
           <div style="padding-bottom: 30px;">
               <a href="{{route('school.prices.add')}}" class="btn btn-primary">+ Add New Price</a>
           </div>
        </div>
        <div class='col-md-4'>
           <div class='form-group'>
             <form action="{{ route('school.prices.index') }}" method="GET">
                 <label for="search" class="sr-only">
                     Enter Class Name
                 </label>
                 <input type="text" name="search"
                     class="form-control"
                     placeholder="Search the class prices."
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
        @if($schoolPrices->count()>0)
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
                            <th> Sr. # </th>
                            <th> Image </th>
                            <th> Title </th>
                            <th> Class </th>
                            <th> Department </th>
                            <th> Price </th>
                            <th> Publisher </th>
                            <th> Qty. </th>
                            <th> Total </th>
                            <th> Actions </th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ( $schoolPrices as $price )
                            <tr>
                                <td> {{$price->school_class_price_id}} </td>
                                <td> <img src='{{ asset('images/'.$price->subject_image) }}'></td>
                                <td> {{$price->title->school_title_name}} </td>
                                <td> {{$price->class->school_class_name}} </td>
                                <td> {{$price->department->school_department_name}} </td>
                                <td> {{$price->school_unit_price}} </td>
                                <td> {{$price->school_qty}} </td>
                                <td> {{($price->school_qty) * ($price->school_unit_price) }} </td>


                                <td class='embed-responsive'>
                                    <a class="btn btn-primary" href="#" >Edit</a>|
                                    <a class="btn btn-danger" onclick="deletePrice({{$price->school_class_price_id}},'{{$price->school_title_name}}')">Delete</a>|

                                </td>

                            </tr>

                           @endforeach
                        </tbody>
                    </table>
                    <div style="padding-top: 10px">
                        {!! $schoolPrices->links() !!}
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>

        @else
        <h2>No any price exists. </h2>

        @endif
    </div>

@endsection
@push('scripts')
<script type="text/javascript">
    function deletePrice($departmentId,$departmentName) {
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

