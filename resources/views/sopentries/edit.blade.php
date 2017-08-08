@extends('main_dashboard')

@section('title','| Edit SOP')

@section('content')
<div class="row">
	<div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li><a href="">>>Account</a></li>
			<li><a href="">Index</a></li>
			<li><a href="">Insert</a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="/sopentries">>>SOP</a></li>
			<li class="active"><a href="/sopentries">Index <span class="sr-only">(current)</span></a></li>
			<li><a href="/sopentries/create">Insert</a></li>			
		</ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Data SOP - {{ $sop->nama_sop }}</h1>
		<div class="row">
			{!! Form::model($sop, ['route' => ['sopentries.update', $sop->id], 'method' => 'PUT', 'files' => true]) !!}
			<div class="col-md-8">
				{{ Form::label('nama_sop', 'Application SOP Title') }}
				{{ Form::text('nama_sop', null, ["class" => 'form-control input-lg']) }}
				<br>
				{{ Form::label('unit', 'Unit') }}
				{{ Form::select('unit', ['IPA' => 'IT Planning & Infrastructure', 'EPD' => 'Enterprise & Analytic Platform Development', 'BPD' => 'BSS & CEM Platform Development', 'OPD' => 'OSS Platform Development', 'SPD' => 'Service Platform Development',  'EPO' => 'Enterprise & Analytic Platform Operation', 'BPO' => 'BSS & CEM Platform Operation', 'OPO' => 'OSS Platform Operation', 'SPO' => 'Service Platform Operation', 'CFU' => 'CFU/FU Support  ITSM', 'GA' => 'General Affair'], null, array('class' => 'form-control')) }}
				
				{{ Form::label('url_aplikasi', 'Application URL') }}
				{{ Form::text('url_aplikasi', null, ["class" => 'form-control']) }}

				{{ Form::label('deskripsi_aplikasi', 'Application Description: ') }}
				{{ Form::textarea('deskripsi_aplikasi', null, array('class' => 'form-control')) }}

				{{ Form::label('file_aplikasi', 'Application File: ') }}
				<br><a target="_blank" href="{{ route('getEntry', $sop->filename) }}">{{ $sop->original_filename }}</a>
				{{ Form::file('file_aplikasi', null, array('class' => 'form-control')) }}

			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($sop->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('sopentries.show', 'Cancel', array($sop->id), array('class' => 'btn btn-danger btn-block')) !!}
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
