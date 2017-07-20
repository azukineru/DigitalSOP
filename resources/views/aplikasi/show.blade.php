@extends('main_dashboard')

@section('title','| View Application')

@section('content')
<div class="row">
	<div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li><a href="#">Overview</a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="">Account</a></li>
			<li><a href="">Insert</a></li>
			<li><a href="">Update</a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="">Application</a></li>
			<li><a href="create">Insert</a></li>
			<li class="active"><a href="show">View <span class="sr-only">(current)</span></a></li>
		</ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">This is the list of SOP</h1>
		<div class="row">
			<div class="col-md-8">
				<h1>{{ $aplikasi->nama_aplikasi }}</h1>
				<p class="lead">
					{{ $aplikasi->url_aplikasi }}
					<br>
					{{ $aplikasi->url_sop }}
				</p>
			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>Time</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							<a href="#" class="btn btn-primary btn-block">Edit</a>
						</div>
						<div class="col-sm-6">
							<a href="#" class="btn btn-danger btn-block">Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection