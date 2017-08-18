@extends('main_dashboard')

@section('title','| Edit Account')

@section('content')
<div class="row">
	<div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li><a href="/account">>>Account</a></li>
			<li class="active"><a href="/account">Index <span class="sr-only">(current)</span></a></li>
			<li><a href="/account/create">Insert</a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="/sopentries">>>SOP</a></li>
			<li><a href="/sopentries">Index</a></li>
			<li><a href="/sopentries/create">Insert</a></li>			
		</ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Edit Account - {{ $account->name }}</h1>
		<div class="row">
			{!! Form::model($account, ['route' => ['account.update', $account->id], 'method' => 'PUT']) !!}
			<div class="col-md-8">
				<div class="form-group">
					<label>Name</label>
					<input name="name" type="text" class="form-control" value="{{ $account->name }}">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input name="email" type="text" class="form-control" value="{{ $account->email }}">
				</div>	
				<div class="form-group">
					<label>Account Type</label>
					<select name="type" class="form-control">
						<option value="A">Administrator</option>
						<option value="B">Basic Account</option>
					</select>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input name="password" type="password" class="form-control">
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input name="confirm_password" type="password" class="form-control">
				</div>

			</div>
			<div class="col-md-4">
				<div class="well">
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('account.show', 'Cancel', array($account->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}							
						</div>
					</div>
				</div>
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
