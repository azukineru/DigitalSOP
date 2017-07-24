@extends('main_dashboard')

@section('title','| Edit Application')

@section('content')
<div class="row">
	<div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li><a href="">>>Account</a></li>
			<li><a href="">Index</a></li>
			<li><a href="">Insert</a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="/aplikasi">>> Application</a></li>
			<li class="active"><a href="/aplikasi">Index <span class="sr-only">(current)</span></a></li>
			<li><a href="create">Insert</a></li>
		</ul>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Data SOP - {{ $aplikasi->nama_aplikasi }}</h1>
		<div class="row">
			{!! Form::model($aplikasi, ['route' => ['aplikasi.update', $aplikasi->id], 'method' => 'PUT']) !!}
			<div class="col-md-8">
				{{ Form::label('nama_aplikasi', 'Application Name') }}
				{{ Form::text('nama_aplikasi', null, ["class" => 'form-control input-lg']) }}
				<br>
				{{ Form::label('unit', 'Unit') }}
				{{ Form::select('unit', ['IPA' => 'IT Planning & Infrastructure', 'EPD' => 'Enterprise & Analytic Platform Development', 'BPD' => 'BSS & CEM Platform Development', 'OPD' => 'OSS Platform Development', 'SPD' => 'Service Platform Development',  'EPO' => 'Enterprise & Analytic Platform Operation', 'BPO' => 'BSS & CEM Platform Operation', 'OSO' => 'OSS Platform Operation', 'SPO' => 'Service Platform Operation', 'CFU' => 'CFU/FU Support  ITSM', 'GA' => 'General Affair'], null, array('class' => 'form-control')) }}
				{{ Form::label('url_aplikasi', 'Application URL') }}
				{{ Form::text('url_aplikasi', null, ["class" => 'form-control']) }}
				{{ Form::label('url_sop', 'SOP URL') }}
				{{ Form::text('url_sop', null, ["class" => 'form-control']) }}
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
							{!! Html::linkRoute('aplikasi.show', 'Cancel', array($aplikasi->id), array('class' => 'btn btn-danger btn-block')) !!}
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
