<head>
    <link href="{{asset('css/fatherdetails.css') }}" rel="stylesheet">
</head>

<div>
	<!-- code here -->
	<div class="card">
		<div class="card-image">
			<h2 class="card-heading">
				Get started
				<small>Let us create your account</small>
			</h2>
		</div>
		<form class="card-form" method="POST" action="{{route('account.register')}}">
            @csrf
			<div class="input">
                <label>Contact Number</label>

				<input type="text" class="input-field" name='contactNumber' id='contactNumber' placeholder="Enter Contact Number 03334123049" pattern="[0-9]{11}" required value="{{old('contactNumber')}}" />
                @error('contactNumber')
                <span class="invalid-feedback alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
			</div>
			<div class="input">
                <label>Name</label>
				<input type="text" class="input-field" name='accountholdername' id='accountholdername' placeholder="Muhammad Khan"  required value="{{old('accountholdername')}}"/>
                @error('accountholdername')
                <span class="invalid-feedback alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
			</div>
            <div class="input">
                <label>Password</label>
				<input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required placeholder="Enter password" autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
			</div>
            <div class="input">
                <label>Confirm Password</label>
				<input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Enter Password to confirm." required autocomplete="current-password">
			</div>
     		<div class="action">
				<button class="action-button" type="submit">Next</button>

			</div>
		</form>
		<div class="card-info">
			<p>By signing up you are agreeing to our <a href="{{route('home.register.rules')}}">Terms and Conditions</a></p>
           <button><a href={{route('home.index')}}>Home</a></button>
		</div>
	</div>
</div>
