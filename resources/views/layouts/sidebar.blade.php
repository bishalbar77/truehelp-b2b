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
            <a href="{{ url('health') }}" class="nav-link {{ Request::is('health') ? 'active' : '' }}">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p class="nav-menu">
                Health Check
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('home') }}" class="nav-link {{ Request::is('/') || Request::is('home') || Request::is('orders') ? 'active' : '' }}">
            <span style="padding-left:1px;" class="feather-icon select-none relative"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></span>
             <p class="nav-menu">
                &nbsp;Verifications
              </p>
            </a>
            <!-- <li class="nav-item">
              <a href="{{ url('orders') }}" class="nav-link {{ Request::is('orders')  ? 'active' : '' }}">
                <i class="nav-icon fa fa-user-circle-o"></i>
                <p class="nav-menu">Order Verification</p>
              </a>
            </li> -->
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
          <!-- <li class="nav-item">
          <a href="{{ url('surveys/') }}" class="nav-link {{ Request::is('surveys/') || Request::is('surveys/details/*')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-list-alt"></i>
              <p class="nav-menu">
                Health Reports
              </p>
            </a>
          </li> -->
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
          <li class="nav-header nav-menu-tag">BILLING</li>
          <li class="nav-item">
            <a href="{{ url('subscribe') }}" class="nav-link {{ Request::is('subscribe')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-tasks"></i>
              <p class="nav-menu">Subscription</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('card-pay') }}" class="nav-link {{ Request::is('card-pay')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-credit-card"></i>
              <p class="nav-menu">Add default card</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('invoice') }}" class="nav-link {{ Request::is('invoice')  ? 'active' : '' }}">
              <i class="nav-icon fa fa-bars"></i>
              <p class="nav-menu">Invoices</p>
            </a>
          </li>
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
          <form id="logout-form" action="{{ route('logout') }}" style="display: none;">
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