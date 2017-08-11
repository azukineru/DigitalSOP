@extends('main_dashboard')

@section('title','| Profile')

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
		<h1 class="page-header">{{ $account->name }}</h1>
		<div class="row">
			<div class="col-md-8">
				<p class="lead">
					<strong>Email :<br></strong>{{ $account->email }}
				</p>
			</div>
			<div class="col-md-4">
				<div class="well">
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('account.edit', 'Edit', array($account->id), array('class' => 'btn btn-primary btn-block')) !!}
						</div>
						<div class="col-sm-6">
							<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">
								Delete
							</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Are you sure want to delete this ?</h4>
						</div>
						<div class="modal-footer">
							{!! Form::open(['route' => ['account.destroy', $account->id], 'method' => 'DELETE']) !!}							

							{!! Form::submit('Yes', ['class' => 'btn btn-primary pull-right'], ['type' => 'button']) !!}

							{!! Form::close() !!}

							<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
							{{-- <button type="submit" class="btn btn-primary">Yes</button> --}}

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection