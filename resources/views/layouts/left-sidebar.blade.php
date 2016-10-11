<!-- /. NAV SIDE  -->
<nav role="navigation" class="navbar-default navbar-side">
    <div class="sidebar-collapse">
        <ul id="main-menu" class="nav left-sidebar">

            <li class="{{ $activeMenu === 'users' ? 'active-link' : '' }} users-icon">
                <a href="{{ route('users') }}">Users  <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </li>

            <li class="{{ $activeMenu === 'groups' ? 'active-link' : '' }} groups-icon">
                <a href="{{ route('groups') }}">Groups  <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </li>


            <li class="{{ $activeMenu === 'groupMedia' ? 'active-link' : '' }} group-media-icon">
                <a href="{{ route('group-media') }}">Group Media<i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </li>

            <li class="{{ $activeMenu === 'directMedia' ? 'active-link' : '' }} direct-media-icon">
                <a href="{{route('direct-media')}}">Direct Media<i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </li>

            <li class="global-message-icon">
                <a href="#">Global Message<i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </li>
        </ul>
    </div>

</nav>

