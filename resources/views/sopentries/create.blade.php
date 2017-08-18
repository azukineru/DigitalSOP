@extends('main_dashboard')

@section('title','| Insert SOP')

@section('content')
<div class="row">
	<div class="col-sm-3 col-md-2 sidebar">
		@if( Auth::user()->type == 'A' )
		<ul class="nav nav-sidebar">
			<li><a href="/account">>>Account</a></li>
			<li><a href="/account">Insert</a></li>
			<li><a href="/account/create">View</a></li>
		</ul>
		@endif
		<ul class="nav nav-sidebar">
			<li><a href="/sopentries">>>SOP</a></li>
			<li><a href="/sopentries">Index</a></li>
			<li class="active"><a href="/sopentries/create">Insert <span class="sr-only">(current)</span></a></li>			
		</ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Insert New SOP</h1>
		<div class="row">
			<div class="col-md-6">
				{!! Form::open(array('route' => 'sopentries.store', 'method' => 'post', 'files' => true)) !!}
					{{ Form::label('nama_sop', 'Application SOP Title: ') }}
					{{ Form::text('nama_sop', null, array('class' => 'form-control', 'required' => 'required')) }}

					{{ Form::label('unit', 'Unit: ') }}
					{{ Form::select('unit', ['IPA' => 'IT Planning & Infrastructure', 'EPD' => 'Enterprise & Analytic Platform Development', 'BPD' => 'BSS & CEM Platform Development', 'OPD' => 'OSS Platform Development', 'SPD' => 'Service Platform Development',  'EPO' => 'Enterprise & Analytic Platform Operation', 'BPO' => 'BSS & CEM Platform Operation', 'OPO' => 'OSS Platform Operation', 'SPO' => 'Service Platform Operation', 'CFU' => 'CFU/FU Support  ITSM', 'GA' => 'General Affair'], 'IPA', array('class' => 'form-control')) }}

					{{ Form::label('url_aplikasi', 'URL Application: ') }}
					{{ Form::text('url_aplikasi', null, array('class' => 'form-control')) }}

					{{ Form::label('deskripsi_aplikasi', 'Application Description: ') }}
					{{ Form::textarea('deskripsi_aplikasi', null, array('class' => 'form-control')) }}

					{{ Form::label('file_aplikasi', 'Application File: ') }}
					{{ Form::file('file_aplikasi', null, array('class' => 'form-control')) }}

					{{ Form::submit('Submit', array('class' => 'btn btn-default', 'style' => 'margin-top:10px;')) }}
				{!! Form::close() !!}
				

			</div>
		</div>
	</div>
</div>
@endsection