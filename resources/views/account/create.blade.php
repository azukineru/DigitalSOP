@extends('main_dashboard')

@section('title','| Create Account')

@section('content')
<div class="row">
	<div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li><a href="/account">>>Account</a></li>
			<li><a href="/account">Index</a></li>
			<li class="active"><a href="/account/create">Insert <span class="sr-only">(current)</span></a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="/sopentries">>>SOP</a></li>
			<li><a href="/sopentries">Index</a></li>
			<li><a href="/sopentries/create">Insert</a></li>			
		</ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Create New Account</h1>
		<div class="row">
			<div class="col-md-6">
			<form action="{{ Route('account.store') }}" method="post">
					<div class="form-group">
						<label>Name</label>
						<input name="name" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input name="email" type="text" class="form-control">						
					</div>
					<div class="form-group">
						<label>Password</label>
						<input name="password" type="password" class="form-control">						
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input name="confirm_password" type="password" class="form-control">						
					</div>
					<div class="form-group">
						<label>Account Type</label>
						<select name="type" class="form-control">
							<option value="A">Administrator</option>
							<option value="B">Basic Account</option>
						</select>
					</div>

					<div class="row">
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
						</div>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form>
				

			</div>
		</div>
	</div>
</div>
@endsection