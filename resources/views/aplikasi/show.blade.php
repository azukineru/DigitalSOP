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
			<li><a href="">Index</a></li>
			<li><a href="">Insert</a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="/aplikasi">> Application</a></li>
			<li class="active"><a href="/aplikasi">Index <span class="sr-only">(current)</span></a></li>
			<li><a href="create">Insert</a></li>
		</ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Data SOP - {{ $aplikasi->nama_aplikasi }}</h1>
		<div class="row">
			<div class="col-md-8">
				<h1>{{ $aplikasi->nama_aplikasi }}</h1>
				<p class="lead">
					{{ $aplikasi->unit }}
					<br>
					{{ $aplikasi->url_aplikasi }}
					<br>
					{{ $aplikasi->url_sop }}
				</p>
			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($aplikasi->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('aplikasi.edit', 'Edit', array($aplikasi->id), array('class' => 'btn btn-primary btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{!! Html::linkRoute('aplikasi.destroy', 'Delete', array($aplikasi->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
					</div>
				</div>
			</div>
			</hr>
		</div>
	</div>
</div>
@endsection