@extends('main_dashboard')

@section('title','| View SOP')

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
			<div class="col-md-8">
				<p class="lead">
					<strong>Unit :<br></strong>{{ $sop->unit }}
					<br>
					<strong>Application URL :<br></strong>{{ $sop->url_aplikasi }}
					<br>
					<strong>Application Description :<br></strong>{{ $sop->deskripsi_aplikasi }}
					<br>
					<strong>File :<br></strong>
					<a target="_blank" href="{{ route('getEntry', $sop->filename) }}">{{ $sop->original_filename }}</a>
				</p>
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
							{!! Html::linkRoute('sopentries.edit', 'Edit', array($sop->id), array('class' => 'btn btn-primary btn-block')) !!}
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
							{!! Form::open(['route' => ['sopentries.destroy', $sop->id], 'method' => 'DELETE']) !!}							

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