@extends('dashboard.layouts.main')
<head>
    @push('title')
       <title> Edit Student. </title>
    @endpush

    <link href="{{ asset('css/studentregisteration.css') }}" rel="stylesheet">
</head>
@section('main-content')
<div class="container">
    <div style="align-content: center; padding-top:30px;" class="row">
        <h1>Student Edit form.</h1>
        <p>Please Update student details here.  </p>

    </div>
    <form method="POST" action="{{route('student.update',$student->student_id)}}">
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
                    <label>Student Name</label>
                    <input type="text" class="form-control" id="StudentName" name='StudentName' value="{{old('StudentName',$student->student_name)}}" placeholder="Please Enter Student Name." required>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Student Class</label>
                    <select id="StudentClass" name='StudentClass' class="select" required>
                      <option disabled>Choose Student Current Class...</option>
                      @foreach($classes as $class)
                        <option value={{"$class->class_id"}}
                          @if(old('StudentClass',$student->class_id) == $class->class_id) selected @endif
                          >{{ $class->class_name}}</option>

                      @endforeach
                    </select>
                  </div>
                </div>
                <div class='form-group row'>
                    <div class="form-group col-md-12">
                        <p>If you cannot find the school name from the list, please select others and fill in the name of the school and its address. </p>
                        <div class="form-group">
                          <img src="{{asset('images/homepageimages/15.png')}}" alt="Icon" width="auto" height="70px" class="img-fluid" >
                        </div>
                        <label for="StudentSchool">Student School</label>
                        <select id="StudentSchool" name='StudentSchool' class="select" onchange="showDiv(this)">
                          <option disabled>Choose Student Current School...</option>
                          @foreach($schools as $school)
                          <option value={{"$school->school_id"}}
                          @if(old('school_id',$student->school_id) == $school->school_id) selected @endif>
                              {{ $school->school_name.', Address: '.$school->school_address}}
                         </option>
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
                <button type="submit" class="btn btn-primary" name='submitbtn' title="Update Student">Update Student</button> |
                <a class="btn btn-danger" href="{{route('student.index')}}"> Cancel </a>

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
