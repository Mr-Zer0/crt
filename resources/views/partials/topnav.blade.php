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

<nav class="cyan">
    <div class="nav-wrapper">

        <div class="brand-logo">
            @yield('page_title')
        </div> <!-- end of brand-logo -->
        
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                @if (auth()->check())
                    <a class="dropdown-button" 
                        href="#!" 
                        data-activates="dropdown1"  
                        data-beloworigin="true" 
                        data-constrainwidth="false">
                            Hi ! {{ auth()->user()->name }} <i class="material-icons right">face</i>
                    </a>
                @else

                    <a href="{{ route('login') }}">Login</a>

                @endif
            </li>
        </ul>
    </div> <!-- End of nav-wrapper -->
</nav>