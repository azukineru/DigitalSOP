@extends('main_dashboard')

@section('title','| Insert Application')

@section('content')
<div class="row">
	<div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li><a href="">>>Account</a></li>
			<li><a href="">Insert</a></li>
			<li><a href="">View</a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="">>>Application</a></li>
			<li><a href="/aplikasi">Index</a></li>
			<li class="active"><a href="create">Insert <span class="sr-only">(current)</span></a></li>
		</ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Insert New Application</h1>
		<div class="row">
			<div class="col-md-6">
				{!! Form::open(['route' => 'aplikasi.store']) !!}
					{{ Form::label('nama_aplikasi', 'Application Name: ') }}
					{{ Form::text('nama_aplikasi', null, array('class' => 'form-control')) }}

					{{ Form::label('unit', 'Unit: ') }}
					{{ Form::select('unit', ['IPA' => 'IT Planning & Infrastructure', 'EPD' => 'Enterprise & Analytic Platform Development', 'BPD' => 'BSS & CEM Platform Development', 'OPD' => 'OSS Platform Development', 'SPD' => 'Service Platform Development',  'EPO' => 'Enterprise & Analytic Platform Operation', 'BPO' => 'BSS & CEM Platform Operation', 'OSO' => 'OSS Platform Operation', 'SPO' => 'Service Platform Operation', 'CFU' => 'CFU/FU Support  ITSM', 'GA' => 'General Affair'], 'IPA', array('class' => 'form-control')) }}

					{{ Form::label('url_aplikasi', 'URL Application: ') }}
					{{ Form::text('url_aplikasi', null, array('class' => 'form-control')) }}

					{{ Form::label('url_sop', 'URL SOP: ') }}
					{{ Form::text('url_sop', null, array('class' => 'form-control')) }}

					{{ Form::submit('Submit', array('class' => 'btn btn-default', 'style' => 'margin-top:10px;')) }}
				{!! Form::close() !!}
				

			</div>
		</div>
	</div>
</div>
@endsection