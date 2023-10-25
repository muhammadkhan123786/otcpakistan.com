@extends('dashboard.layouts.main')
<link href="{{ asset('css/studentregisteration.css') }}" rel="stylesheet">
@push('title')
  <title> Change Password. </title>
@endpush
@section('main-content')
@push('page-name')
<h5 style="padding-top: 20px; color:black">You are at change password. </h5>
@endpush
<div class="container" style="padding-top: 20px;">
    <form method="POST" action="{{route('update.password')}}">
        @csrf
        @if(session()->has('message'))
                    <div class="alert alert-success">
                       {{session()->get('message') }}
                    </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
       @endif
     <div id='studentform'>
      <div class="row">
        <div class="col-25">
          <label for="fname">Enter Current Password</label>
        </div>
        <div class="col-75">
          <input type="password" class='input-field' id="currentpassword" name="currentpassword"  placeholder="Please enter current password." required>
        </div>
        @error('currentpassword')
                <span class="invalid-feedback alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
      </div>
      <div class="row">
        <div class="col-25">
          <label for="class">Enter new password</label>
        </div>
        <div class="col-75">
            <input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required placeholder="Enter new password" autocomplete="current-password">
        </div>
        @error('password')
                <span class="invalid-feedback alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
      </div>
      <div class="row">
        <div class="col-25">
          <label for="school">Confirm new password</label>
        </div>
        <div class="col-75">
            <input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Enter Password to confirm." required autocomplete="current-password">
        </div>
        @error('confirmpassword')
            <span class="invalid-feedback alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="row">
        <div class="col-75">
        <button class="submitButtonstudentRegistration" type="submit" title="update-password">Update Password</button>
        </div>
      </div>
    </div>


    </form>
  </div>
@endsection
