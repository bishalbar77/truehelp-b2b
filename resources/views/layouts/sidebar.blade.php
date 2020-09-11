    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
      <img src="{{ asset('images/Logo-07.png') }}" alt="TrueHelp Logo" class="brand-image">
      <span class="brand-text font-weight-light pl-5 ls-5"><img src="{{ asset('images/truehelp-01.png') }}" alt="TrueHelp Logo" class="brand-image"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header nav-menu-tag">MENU</li>
          <li class="nav-item">
            <a href="{{ url('home') }}" class="nav-link {{ Request::is('/') || Request::is('home') ? 'active' : '' }}">
              <i class="nav-icon fa fa-th"></i>
              <p class="nav-menu">
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('employees') }}" class="nav-link {{ Request::is('employees')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-user"></i>
              <p class="nav-menu">
                My Candidate
                <!-- <span class="right"><i class="fa fa-exclamation-circle"></i></span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('search') }}" class="nav-link {{ Request::is('search')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-user-circle-o"></i>
              <p class="nav-menu">
                Search Candidate
              </p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('surveys/dashboard') || Request::is('surveys/reports') || Request::is('surveys/details/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('surveys/dashboard') || Request::is('surveys/reports') ? 'active' : '' }}">
              <i class="nav-icon fa fa-list-alt"></i>
              <p class="nav-menu">
                Health Check
                <i class="right fa fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('/dashboard')  ? 'active' : '' }}">
                  <i class="nav-icon fa fa-angle-double-right"></i>
                  <p class="nav-menu">
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('surveys/reports') }}" class="nav-link {{ Request::is('surveys/reports') || Request::is('surveys/details/*')  ? 'active' : '' }}">
                  <i class="nav-icon fa fa-angle-double-right"></i>
                  <p class="nav-menu">
                    Reports
                  <!-- <span class="right"><i class="fa fa-exclamation-circle"></i></span> -->
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('notifications') }}" class="nav-link {{ Request::is('notifications')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-bell"></i>
              <p class="nav-menu">
                Notifications
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-bell-o"></i>
              <p class="nav-menu">
                Notifications
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="{{ url('profile') }}" class="nav-link {{ Request::is('profile')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-address-card-o"></i>
              <p class="nav-menu">
                Profile
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-header nav-menu-tag">SUPPORT</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p class="nav-menu">
                Need help?
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p class="nav-menu">
                Contact us
              </p>
            </a>
          </li> -->
          <li class="nav-header nav-menu-tag">SETTINGS</li>
          <li class="nav-item">
            <a href="{{ url('profile') }}" class="nav-link {{ Request::is('profile')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-cog"></i>
              <p class="nav-menu">Preferences</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-moon-o"></i>
              <p class="nav-menu">Dark Mode</p>
            </a>
          </li> -->
          <form id="logout-form" action="https://enterprise.gettruehelp.com/v2/public/logout" style="display: none;">
            @csrf
          </form>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-sign-out"></i>
              <p class="nav-menu">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->