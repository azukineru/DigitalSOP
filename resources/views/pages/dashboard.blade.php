@extends('main_dashboard')

@section('title','| Dashboard')

@section('content')
	<div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        	<ul class="nav nav-sidebar">
            	<li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
          	</ul>
         	<ul class="nav nav-sidebar">
	            <li><a href="">Account</a></li>
	            <li><a href="">Insert</a></li>
	            <li><a href="">Update</a></li>
          	</ul>
         	<ul class="nav nav-sidebar">
	            <li><a href="">Application</a></li>
	            <li><a href="create">Insert</a></li>
	            <li><a href="show">View</a></li>
          	</ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Digital SOP Dashboard</h1>
			<div class="row placeholders">
	          	<div class="col-xs-6 col-sm-3 placeholder">
	          		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
	          		<h4>Manage Account</h4>
	          	</div>
	          	<div class="col-xs-6 col-sm-3 placeholder">
	          		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
	          		<h4>Manage Unit</h4>
	          	</div>
	          	<div class="col-xs-6 col-sm-3 placeholder">
	          		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
	          		<h4>Manage Application</h4>
	          	</div>
          	</div>
        </div>
    </div>
@endsection