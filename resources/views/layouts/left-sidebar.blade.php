<!-- /. NAV SIDE  -->
<nav role="navigation" class="navbar-default navbar-side">
    <div class="sidebar-collapse">
        <ul id="main-menu" class="nav">



            <li class="{{ $activeMenu === 'dashboard' ? 'active-link' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="fa fa-desktop "></i>Dashboard </a>
            </li>


            <li class="{{ $activeMenu === 'users' ? 'active-link' : '' }}">
                <a href="{{ route('users') }}"><i class="fa fa-table "></i>Users  </a>
            </li>
            <li>
                <a href="{{ route('groups') }}"><i class="fa fa-edit "></i>Groups  </a>
            </li>


            <li>
                <a href="#"><i class="fa fa-qrcode "></i>Media</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i>Global Message</a>
            </li>
        </ul>
    </div>

</nav>

