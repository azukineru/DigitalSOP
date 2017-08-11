@extends('main_dashboard')

@section('title','| Dashboard')

@section('content')
	<div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
         	<ul class="nav nav-sidebar">
	            <li><a href="/account">>>Account</a></li>
	            <li><a href="/account">Index</a></li>
	            <li><a href="/account/create">Insert</a></li>
          	</ul>
			<ul class="nav nav-sidebar">
				<li><a href="/sopentries">>>SOP</a></li>
				<li><a href="/sopentries">Index</a></li>
				<li><a href="/sopentries/create">Insert</a></li>			
			</ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Digital SOP Dashboard</h1>
			<div class="row placeholders">
	          	<a href="/account">
	          	<div class="col-xs-6 col-sm-3 placeholder">
	          		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
	          		<h4>Manage Account</h4>
	          	</div>
	          	</a>
	          	<a href="/sopentries">
	          	<div class="col-xs-6 col-sm-3 placeholder">
	          		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
	          		<h4>Manage SOP</h4>
	          	</div>
	          	</a>
          	</div>
        </div>
    </div>
@endsection