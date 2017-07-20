<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

@if (Session::has('success'))

	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>

@endif

@if (count($errors) > 0)

	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong>
		@foreach ( $errors->all() as $error )
			<li>{{ $error }}</li>
		@endforeach
	</div>

@endif

</div>