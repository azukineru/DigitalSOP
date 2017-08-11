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
				{{ Form::label('name', 'Account Name') }}
				{{ Form::text('name', null, ["class" => 'form-control input-lg']) }}
				
				{{ Form::label('password', 'Password') }}
				{{ Form::text('password', null, ["class" => 'form-control input-lg']) }}
				<br>
				{{ Form::label('type', 'Account Type') }}
				{{ Form::select('type', ['A' => 'Administrator', 'B' => 'Basic Account'], null, array('class' => 'form-control')) }}

			</div>
			<div class="col-md-4">
				<div class="well">
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('account.profile', 'Cancel', array($account->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}							
						</div>
					</div>
				</div>
			</div>
			<hr>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
