<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('partials._head')
</head>

<body>
    @include('partials._dashboardnav')

    <div class="container-fluid">
    	@include('partials._messages')
        @yield('content')  
        
    </div>

    @include('partials._javascript')
    @yield('js')
</body>

</html>
