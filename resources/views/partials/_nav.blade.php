
<header id="top-bar" class="navbar-fixed-top animated-header">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">
                    <a href="index.html" >
                        <img src="images/logo.png" alt="">
                    </a>
                </div>
            </div>
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <div class="main-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/" >Home</a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">IT Development <span class="caret"></span></a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a href="404.html">IT Planning & Architecture</a></li>
                                    <li><a href="gallery.html">Enterprise & Analytic Platform Dev</a></li>
                                    <li><a href="gallery.html">BSS & CEM Platform Dev</a></li>
                                    <li><a href="gallery.html">OSS Platform Dev</a></li>
                                    <li><a href="gallery.html">Service Platform Dev</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">IT Operation <span class="caret"></span></a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a href="blog-fullwidth.html">Enterprise & Analytic Platform Op</a></li>
                                    <li><a href="bpo">BSS & CEM Platform Op</a></li>
                                    <li><a href="blog-right-sidebar.html">OSS Platform Op</a></li>
                                    <li><a href="blog-right-sidebar.html">Service Platform Op</a></li>
                                    <li><a href="blog-right-sidebar.html">CFU/FU Support & ITSM</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="contact.html">General Affair</a></li>
                        <li><a href="/about">Kipas Budaya</a></li>
                        @if (Auth::guest())
                        <li><a href="/login">Login</a></li>
                        @else
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endif
                    </ul>
                </div>
            </nav>

            <div class="search widget">
                <form action="" method="get" class="searchform" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"> <i class="ion-search"></i> </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
</header>