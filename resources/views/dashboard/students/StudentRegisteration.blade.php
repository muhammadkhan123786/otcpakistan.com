@extends('dashboard.layouts.main')
<head>
    @push('title')
       <title> Add Student. </title>
    @endpush

    <link href="{{ asset('css/studentregisteration.css') }}" rel="stylesheet">
</head>
@section('main-content')
<div class="container">
    <div style="align-content: center; padding-top:30px;" class="row">
        <h1>Student registeration form.</h1>
        <p>Please Enter student details here. If you want to enter more than one student information please click on add more student button. </p>
        <img src="{{url('images/homepageimages/8.png')}}" alt="Icon" class="img-fluid" width="auto" height="50px" >
    </div>
    <form method="POST" action="{{route('student.store')}}">
        @csrf
        @if(session()->has('message'))
                    <div class="alert alert-success">
                       {{session()->get('message') }}
                    </div>
        @endif
        <div id='studentform' class="container">
            <div id='alertspan' style="display: none">
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    Enter School name and address.
                </div>
            </div>

                <div class="form-group row">
                  <div class="form-group col-md-8">
                    <label for="StudentName">Student Name</label>
                    <input type="text" class="form-control" id="StudentName" name='StudentName' placeholder="Please Enter Student Name." required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="StudentClass">Student Class</label>
                    <select id="StudentClass" name='StudentClass' class="select" required>
                      <option selected>Choose Student Current Class...</option>
                      @foreach($classes as $class)
                         <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class='form-group row'>
                    <div class="form-group col-md-12">
                        <p>If you cannot find the school name from the list, please select others and fill in the name of the school and its address. </p>
                        <div class="form-group">
                          <img src="{{url('images/homepageimages/15.png')}}" alt="Icon" width="auto" height="70px" class="img-fluid" >
                        </div>
                        <label for="StudentSchool">Student School</label>
                        <select id="StudentSchool" name='StudentSchool' class="select" onchange="showDiv(this)">
                          <option selected>Choose Student Current School...</option>
                          @foreach($schools as $school)
                            <option value="{{$school->school_id}}">{{$school->school_name.', Address: '.$school->school_address}}</option>
                          @endforeach
                          <option id='others' value='others'> others </option>
                        </select>
                      </div>
                </div>
            <div style="display: none;" id='newschoolentry'>
                <div class="form-row">
                    <div class="form-group col-md-6" id='otherschoolname'>
                        <label for="newSchoolName">School Name</label>
                        <input type="text" class="form-control" id="newschoolname" name='newschoolname' placeholder="Please Enter student current school. ">
                    </div>
                    <div class="form-group col-md-6" id='newschooladdress' name='newschooladdress'>
                        <label for="newschooladdress">School Address</label>
                        <input type="text" class="form-control" id="newschooladdress" name='newschooladdress' placeholder="E/2/4 257 Gulistan Colony Main Qainchi Walton Road, Lahore.">
                      </div>
                </div>
            </div>
                <button type="submit" class="btn btn-primary" name='submitbtn'> + Add Student</button> |
                <a class="btn btn-danger" href="{{route('student.index')}}"> Exit </a>


        </div>
    </form>
</div>

@push('scripts')
   <script type="text/javascript">
        function showDiv(select){
                if(select.value=='others'){
                    document.getElementById('newschoolentry').style.display='block';
                    $('button[name=submitbtn]').click(function() {
                        if(select.value=='others'){
                            if (($('input[name=newschoolname]').val() == '') || ($('input[name=newschooladdress]').val() == '')) {
                                 document.getElementById('alertspan').style.display='block';
                                return false; //prevent submit from submitting
                        }
                    }
                    });


                }

                else{
                    document.getElementById('newschoolentry').style.display = "none";
                    document.getElementById('alertspan').style.display = "none";
                }
        }
    </script>

@endpush

@endsection
