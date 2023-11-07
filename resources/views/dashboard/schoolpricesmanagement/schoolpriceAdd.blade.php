@extends('dashboard.layouts.main')

<head>
    @push('title')
       <title> Add New Prices. </title>
    @endpush

    <link href="{{ asset('css/studentregisteration.css') }}" rel="stylesheet">
</head>

@section('main-content')
<div class="container">
    <div style="align-content: center; padding-top:30px; padding-left:30px;" class="row">
        <h5>Enter class prices.</h5>
    </div>
    <form method="POST" action="{{route('school.prices.store')}}" enctype="multipart/form-data">
        @csrf
        @if(session()->has('message'))
                    <div class="alert alert-success">
                       {{session()->get('message') }}
                    </div>
        @endif
        <div id='studentform' class="container">
               <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="StudentClass">Select Title</label>
                        <select id="titleId" name='titleId' class="select" required>
                          <option selected>Choose Title...</option>
                          @foreach($titles as $title)
                             <option value="{{$title->school_titles_id}}">{{$title->school_title_name}}</option>
                          @endforeach
                        </select>
                        @if($errors->has('titleId'))
                            <p class="alert alert-danger">{{ $errors->first('titleId') }}</p>
                        @endif
                      </div>
                  <div class="form-group col-md-6">
                    <label for="StudentClass">Select Class</label>
                    <select id="classid" name='classid' class="select" required>
                      <option selected>Choose Class...</option>
                      @foreach($classes as $class)
                         <option value="{{$class->school_class_id}}">{{$class->school_class_name}}</option>
                      @endforeach
                    </select>
                        @if($errors->has('classid'))
                            <p class="alert alert-danger">{{ $errors->first('classid') }}</p>
                        @endif
                  </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="StudentClass">Select Department</label>
                        <select id="departmentId" name='departmentId' class="select" required>
                          <option selected>Choose Department...</option>
                          @foreach($departments as $department)
                             <option value="{{$department->school_department_id}}">{{$department->school_department_name}}</option>
                          @endforeach
                        </select>
                        @if($errors->has('departmentId'))
                          <p class="alert alert-danger">{{ $errors->first('departmentId') }}</p>
                        @endif
                      </div>
                  <div class="form-group col-md-6">
                    <label for="StudentClass"> Select Publisher </label>
                    <select id="publisherId" name='publisherId' class="select" required>
                      <option selected>Choose Publisher...</option>
                      @foreach($publishers as $publisher)
                         <option value="{{$publisher->school_publisher_id}}">{{$publisher->school_publisher_name}}</option>
                      @endforeach
                    </select>
                    @if($errors->has('publisherId'))
                      <p class="alert alert-danger">{{ $errors->first('publisherId') }}</p>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-4">
                        <label for="StudentClass"> Unit Cost Price</label>
                        <input type="text" class="form-control" id="unitCostPrice" name='unitCostPrice' placeholder="Please Enter Unit Cost Price." required>
                        @if($errors->has('unitCostPrice'))
                          <p class="alert alert-danger">{{ $errors->first('unitCostPrice') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="StudentClass"> Unit Sale Price</label>
                        <input type="text" class="form-control" id="unitSalePrice" name='unitSalePrice' placeholder="Please Enter Unit Sale Price." required>
                        @if($errors->has('unitSalePrice'))
                          <p class="alert alert-danger">{{ $errors->first('unitSalePrice') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="StudentClass"> Quantity </label>
                        <input type="text" class="form-control" id="Quantity" name='Quantity' placeholder="Please Enter Quantity." required>
                        @if($errors->has('Quantity'))
                          <p class="alert alert-danger">{{ $errors->first('Quantity') }}</p>
                        @endif
                    </div>

                </div>
                <div class="form-group row">
                    <div class="form-group col-md-4">
                        <label for="StudentClass"> Image </label>
                        <input type="file" class="form-control" name="image" @error('image') is-invalid @enderror id="selectImage" required>
                        @if($errors->has('image'))
                          <p class="alert alert-danger">{{ $errors->first('image') }}</p>
                        @endif
                        <img id="preview" src="#" alt="your image" class="mt-3" style="display:none;" width="100" height="100"/>

                    </div>
                </div>


                <button type="submit" class="btn btn-primary" name='submitbtn'> + Add Price </button> |
                <a class="btn btn-danger" href="{{route('school.prices.index')}}"> Exit </a>


        </div>
    </form>
</div>

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


@endpush

@endsection
