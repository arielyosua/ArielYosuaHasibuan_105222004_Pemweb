<div class="dropdown-menu dropdown-menu-right">
	@if (Auth::user())
		<a href="{{ route('logout') }}" class="dropdown-item">
			<i class="ni ni-user-run"></i> <span>Logout</span>
		</a>
	@else
		<a class="dropdown-item" data-toggle="modal" data-target="#loginModal">
			<i class="ni ni-bold-right"></i> <span>Login</span>
		</a>
	@endif
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
 	<div class="modal-dialog modal-dialog-centered" role="document">
    	<form class="modal-content" method="POST" action="{{ route('auth.login') }}">
			@csrf
      		<div class="modal-header">
        		<h5 class="modal-title" id="loginModalLabel">Login</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
	      	<div class="modal-body">
	        	<div class="form-group">
	        		<label for="username_or_email">Username / Email</label>
	        		<input type="text" class="form-control" id="username_or_email" name="username_or_email" required>
	        	</div>

	        	<div class="form-group">
	        		<label for="password">Password</label>
	        		<input type="password" class="form-control" id="password" name="password" required>
	        	</div>

	        	@if ($errors->has('username_or_email'))
	        		<div class="alert alert-danger">
	        			{{ $errors->first('username_or_email') }}
	        		</div>
	        	@endif

	        	@if ($errors->has('password'))
	        		<div class="alert alert-danger">
	        			{{ $errors->first('password') }}
	        		</div>
	        	@endif
	      	</div>
	      	<div class="modal-footer">
	        	<button type="submit" class="btn btn-primary">Login</button>
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      	</div>
    	</form>
  	</div>
</div>
