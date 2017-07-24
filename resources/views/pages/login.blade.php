@extends('main')

@section('title','| Login')

@section('content')
<section id="hero-arealogin" >
	<div class="container">
		<div class="row">

			<div class="col-md-12 text-center">

				<div class="block wow fadeInUp" data-wow-delay=".3s">

					<h1> LOG IN TO YOUR ACCOUNT <br></h1>

					<form>
						<input placeholder="Username" type="text" name="username"/><br><br>
						<input placeholder="Password" type="text" name="password"/><br><br>
						<button class="btn">Log In</button>
						<button class="btn">Back</button>

					</form>

				</div>

			</div>
		</div>
	</div>
</section>
@endsection

