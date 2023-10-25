<head>
    <link href="{{ asset('css/fatherdetails.css') }}" rel="stylesheet">
</head>

<div class="container">
	<!-- code here -->
	<div class="card">
		<div class="card-image">
			<h2 class="card-heading">
				Get started
				<small>Let us create your account</small>
			</h2>
		</div>
		<form method="POST" class="card-form" action="{{route('login.post')}}">
            @csrf
            @if(session()->has('message'))
                    <div class="alert alert-danger">
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

			<div class="input">
                <label>Contact Number</label>
				<input type="text" name="contactNumber" id="contactNumber" class="input-field" placeholder="Enter Contact Number 03334123049" pattern="[0-9]{11}" required value="{{old('contactNumber')}}"/>

			</div>
			<div class="input">
                <label>Password</label>
				<input type="Password" name="password" id="password" class="input-field" placeholder="Enter Password"  required/>

			</div>

			<div class="action">
				<button class="action-button" type="submit">Login</button>
			</div>
		</form>
		<div class="card-info">
           <button><a href={{route('home.index')}}>Home</a></button>
		</div>
	</div>
</div>
