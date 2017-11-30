<ul id="slide-out" class="side-nav grey lighten-5 fixed">
    <li>
        <h1 id="logo">CROTON Travel and Tours</h1>
    </li>
    <li><a href="{{ url()->to('/') }}"><i class="material-icons">dashboard</i> Dashboard</a></li>
    <li>
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">
                    <i class="material-icons">supervisor_account</i> User Management
                </a> <!-- end of collapsible-header -->

                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{ route('users.index') }}">Users</a></li>
                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                    </ul>
                </div>
            </li>
        </ul> <!-- end of collapsible collapsible-accordion -->
    </li>
    <li><a href="{{ route('tours.index') }}"><i class="material-icons">directions_boat</i> Tour</a></li>
    <li><a href="!#"><i class="material-icons">settings</i> Settings</a></li>
</ul>

<!-- <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a> -->