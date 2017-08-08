@extends('main_dashboard')

@section('title','| Index SOP')

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
		<h1 class="page-header">All SOP</h1>
		<div class="row">
			<div class="col-md-12">
			<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<table class="table" id="sop-table">
				<thead>
					<th>#</th>
					<th>SOP Title</th>
					<th>Unit</th>
					<th>Application URL</th>
					<th>Description</th>
					<th>File</th>
					<th>Option</th>
				</thead>
			</table>

				<div class="text-center">
					{{-- {!! $sop->links() !!} --}}
				</div>

			</div>
		</div>
	</div>
</div>

@endsection

@section('js')
	<script type="text/javascript">
		$(function() {
		    $('#sop-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: 'http://localhost:8000/sopentries/data',
		        columns: [
		            { data: 'id', name: 'id' },
		            { data: 'nama_sop', name: 'nama_sop' },
		            { data: 'unit', name: 'unit' },
		            { data: 'url_aplikasi', name: 'url_aplikasi' },
		            { data: 'deskripsi_aplikasi', name: 'deskripsi_aplikasi' },
		            { data: 'link', name: 'link' },
		            { data: 'action', name: 'action', orderable: 'false', searchable: 'false' }
		        ]
		    });
		});
	</script>
@endsection