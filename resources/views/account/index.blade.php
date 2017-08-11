@extends('main_dashboard')

@section('title','| Index Account')

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
		<h1 class="page-header">All Account</h1>
		<div class="row">
			<div class="col-md-12">
			<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table" id="acc-table">
					<thead>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Type</th>
						<th>Option</th>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#acc-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: 'http://localhost:8000/account/data',
		        columns: [
		            { data: 'id', name: 'id' },
		            { data: 'name', name: 'name' },
		            { data: 'email', name: 'email' },
		            { data: 'type', name: 'type' },
		            { data: 'action', name: 'action', orderable: 'false', searchable: 'false' }
		        ]
		    });
		});
	</script>
@endsection