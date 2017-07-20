<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('partials._head')
</head>

<body>
    @include('partials._nav')

    <section id="hero-area" >
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="block wow fadeInUp" data-wow-delay=".3s">
                        @yield('header'); 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="works" class="works">
        <div class="container">
            @yield('content')
        </div>
    </section> 

    @include('partials._footer')

    @include('partials._javascript')
</body>

</html>
