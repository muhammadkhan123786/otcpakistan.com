@extends('dashboard.layouts.main')
<head>
    @push('title')
      <title>School Registeration. </title>

    @endpush
    @push('page-name')
       You are in school registeraction page.

    @endpush
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
@section('main-content')
<div class="container" style="padding-top: 20px;">
<form method="POST" action={{route('school.add.new')}} enctype="multipart/form-data">
    <div class="form-group" style="text-align: center">
        <h2 class="card-heading">
            Get started
            <small>Let us create your account.</small>
        </h2>
    </div>
           @csrf
            @if(session()->has('message'))
                    <div class="alert alert-danger">
                       {{session()->get('message') }}
                    </div>
            @endif


            <div class="form-group">
                <label for="schoolstate"> School  </label>
                <select class="form-control" name="schoolId" id="schoolId" required onchange="showDiv(this)">
                    <option disabled selected> ----Select school---- </option>
                    @foreach($schools as $school)
                       <option value="{{$school->school_id}}">{{$school->school_name.' Address: '.$school->school_address}}</option>
                    @endforeach
                    <option id='others' style="font-weight: bold" value='others'> New School </option>
                </select>
                <small id="schoolId" class="form-text text-muted">Please select school to register.</small>
                @if($errors->has('schoolId'))
                    <p class="alert alert-danger">{{ $errors->first('schoolId') }}</p>
                @endif
              </div>
    <div class="form-group" style="display: none;" id='schoolnamediv'>
      <label for="schoolname">School Name</label>
      <input type="text" class="form-control" id="schoolname" name="schoolname" aria-describedby="schoolname" placeholder="Please enter school name.">
      <small id="schoolname" class="form-text text-muted">We'll never share your details with anyone else.</small>
      <small id='schoolnameerror' class='form-text' style="color:red; display:none">Please enter school name. </small>
      @if($errors->has('schoolname'))
         <p class="alert alert-danger">{{ $errors->first('schoolname') }}</p>
      @endif
    </div>
    <div class="form-group">
        <label for="schoolstate">State / Province </label>
        <select class="form-control" name="schoolstate" id="schoolstate" required>
            <option disabled selected> ----Select province---- </option>
            @foreach($provinces as $province)
               <option value="{{$province->provinceId}}">{{$province->provinceName}}</option>
            @endforeach
        </select>
        <small id="schoolstate" class="form-text text-muted">Please select your school state / Province.</small>
        @if($errors->has('schoolstate'))
          <p class="alert alert-danger">{{ $errors->first('schoolstate') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="schoolcity">City </label>
        <select class="form-control form-control-lg" name="schoolcity" id="schoolcity" required>

        </select>
        <small id="schoolcity" class="form-text text-muted">Please select your school city.</small>
        @if($errors->has('schoolcity'))
          <p class="alert alert-danger">{{ $errors->first('schoolcity') }}</p>
        @endif
      </div>
      <div class="form-group" style="display: none" id='schoolAddressdiv'>
        <label for="schooladdress">School Address</label>
        <input type="text" class="form-control" id="schooladdress" name="schooladdress" aria-describedby="schooladdress" placeholder="Please enter school address.">
        <small id="schooladdress" class="form-text text-muted">We'll never share your details with anyone else.</small>
        <small id='schooladdresserror' class='form-text' style="color:red; display:none"> Please enter school address. </small>

        @if($errors->has('schooladdress'))
          <p class="alert alert-danger">{{ $errors->first('schooladdress') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="contactNumber">Contact Number</label>
        <input type="text" class="form-control" id="contactNumber" name="contactNumber" aria-describedby="contactNumber" required placeholder="Please enter contact number to access dashboard.">
        <small id="contactNumber" class="form-text text-muted">We'll never share your details with anyone else.</small>
        @if($errors->has('contactNumber'))
          <p class="alert alert-danger">{{ $errors->first('contactNumber') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="schoolUserName">User Name</label>
        <input type="text" class="form-control" id="schoolUserName" name="schoolUserName" aria-describedby="schoolUserName" required placeholder="Please enter user name.">
        <small id="schoolUserName" class="form-text text-muted">We'll never share your details with anyone else.</small>
        @if($errors->has('schoolUserName'))
          <p class="alert alert-danger">{{ $errors->first('schoolUserName') }}</p>
        @endif
      </div>


    <div class="form-group">
      <label for="schoolpassword">Password</label>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter Password" autocomplete="current-password">
      @if($errors->has('password'))
        <p class="alert alert-danger">{{ $errors->first('password') }}</p>
      @endif
    </div>
    <div class="form-group">
        <label for="confirmpassword"> Confirm Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required placeholder="Enter Password" autocomplete="current-password">
        @if($errors->has('password_confirmation'))
          <p class="alert alert-danger">{{ $errors->first('password_confirmation') }}</p>
        @endif
    </div>
    <div class="form-group">
        <input type="file" class="form-control" name="schoollogoimage" @error('image') is-invalid @enderror id="selectImage" required>
        @if($errors->has('schoollogoimage'))
          <p class="alert alert-danger">{{ $errors->first('schoollogoimage') }}</p>
        @endif
        <img id="preview" src="#" alt="your image" class="mt-3" style="display:none;" width="100" height="100"/>

    </div>
    <button type="submit" class="btn btn-primary" name="submitbtn">Submit</button>
  </form>
</div>

@endsection
@push('scripts')
<script>
    selectImage.onchange = evt => {
        preview = document.getElementById('preview');
        preview.style.display = 'block';


        const [file] = selectImage.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).ready(function(){
    $('#schoolstate').on('change', function () {
        var schoolstate = this.value;
        var url = "{{route('fetch.cities')}}"
        $("#schoolcity").html('');
        $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        schoolstate: schoolstate,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#schoolcity').html('<option value="">-- Select City --</option>');
                        $.each(result.cities, function (key, value) {
                            $("#schoolcity").append('<option value="' + value
                                .cityId + '">' + value.cityName + '</option>');
                        });

                    }
                });
            });




    });


</script>

<script type="text/javascript">
    function showDiv(select){
            if(select.value=='others'){
                document.getElementById('schoolnamediv').style.display='block';
                document.getElementById('schoolAddressdiv').style.display='block';

                $('button[name=submitbtn]').click(function() {
                    if(select.value=='others'){
                        if (($('input[name=schooladdress]').val() == '')) {
                             document.getElementById('schooladdresserror').style.display='block';


                            return false; //prevent submit from submitting
                    }
                    else if(($('input[name=schoolname]').val() == ''))
                    {
                        document.getElementById('schoolnameerror').style.display='block';

                            return false; //prevent submit from submitting


                    }
                }
                });
            }
            else{
                document.getElementById('schoolnamediv').style.display = "none";
                document.getElementById('schoolAddressdiv').style.display = "none";
                document.getElementById('alertspan').style.display = "none";
            }
    }
</script>




@endpush
