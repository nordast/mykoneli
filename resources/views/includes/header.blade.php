<header class="nav-bg-b main-header navfix fixed-top @yield('header.class')">
    <div class="container-fluid m-pad">
        <div class="menu-header">
            <div class="dsk-logo">
                <a class="nav-brand" href="{{ route('main') }}">
                    <img src="{{ asset("images/white-logo-3.png") }}" alt="{{ config('app.name') }}" class="mega-white-logo" width="150px" />
                    <img src="{{ asset("images/logo.png") }}" alt="{{ config('app.name') }}" class="mega-darks-logo" width="150px" />
                </a>
            </div>
            <div class="custom-nav" role="navigation">
                <ul class="nav-list onepge">
                    @include('includes.menu-links')
                    <li><a href="{{ route('main') . '#contact' }}" class="btn-br bg-btn5 btshad-b2 lnk">Contact Us <span class="circle"></span></a> </li>
                </ul>
            </div>
            <div class="mobile-menu2">
                <ul class="mob-nav2">
                    <li><a href="{{ route('main') . '#contact' }}" class="btn-round-  btn-br bg-btn btshad-b1"><i class="fas fa-envelope-open-text"></i></a></li>
                    <li class="navm-"> <a class="toggle" href="#"><span></span></a></li>
                </ul>
            </div>
        </div>
        <!--Mobile Menu-->
        <nav id="main-nav">
            <ul class="first-nav">
                @include('includes.menu-links')
                <li><a href="{{ route('main') . '#contact' }}" class="menu-links">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</header>
