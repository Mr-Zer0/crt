<ul id="dropdown1" class="dropdown-content">
    <li>
        <a href="{{ route('users.edit', auth()->user()->id) }}">
            <i class="material-icons">mode_edit</i> Edit My Account
        </a>
    </li>
    <li>
        <a href="{{ route('logout') }}" 
            onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">
            <i class="material-icons">no_encryption</i> Logout
        </a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
    </li>
</ul> <!-- end of dropdown1 -->

<nav>
    <div class="nav-wrapper">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <a class="dropdown-button" href="#!" data-activates="dropdown1">
                    Hi ! {{ auth()->user()->name }} <i class="material-icons right">face</i></a>
            </li>
        </ul>
    </div> <!-- End of nav-wrapper -->
</nav>

<!-- <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    Collapsed Hamburger
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    Branding Image
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    Left Side Of Navbar
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    Right Side Of Navbar
                    <ul class="nav navbar-nav navbar-right">
                        Authentication Links
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->