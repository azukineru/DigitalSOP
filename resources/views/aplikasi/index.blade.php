@extends('main_dashboard')

@section('title','| Index Application')

@section('content')
<div class="row">
	<div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li><a href="#">Overview</a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="">Account</a></li>
			<li><a href="">Index</a></li>
			<li><a href="">Insert</a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="/aplikasi">Application</a></li>
			<li class="active"><a href="/aplikasi">Index <span class="sr-only">(current)</span></a></li>
			<li><a href="aplikasi/create">Insert</a></li>			
		</ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">All SOP</h1>
		<div class="row">
			<div class="col-md-12">
			<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th>#</th>
						<th>Application Name</th>
						<th>Unit</th>
						<th>Application URL</th>
						<th>SOP URL</th>
						<th>Last Updated</th>
						<th>Option</th>
					</thead>
					<tbody>
						@foreach ($aplikasi as $app)

							<tr>
								<th>{{ $app->id }}</th>
								<td>{{ $app->nama_aplikasi }}</td>
								<td>{{ $app->unit }}</td>
								<td>{{ $app->url_aplikasi }}</td>
								<td>{{ $app->url_sop }}</td>
								<td>{{ date('M j, Y h:ia', strtotime($app->updated_at)) }}</td>
								<td><a href="{{ route('aplikasi.show', $app->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('aplikasi.edit', $app->id) }}" class="btn btn-default btn-sm">Edit</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


@endsection