<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
      <!-- Sidebar toggle button -->
      <button id="sidebar-toggler" class="sidebar-toggle">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <!-- search form -->
      <div class="search-form d-none d-lg-inline-block">
        <div class="input-group">
          <button type="button" name="search" id="search-btn" class="btn btn-flat">
            <i class="mdi mdi-magnify"></i>
          </button>
          <input type="text" name="query" id="search-input" class="form-control"
            autofocus autocomplete="off" />
        </div>
        <div id="search-results-container">
          <ul id="search-results"></ul>
        </div>
      </div>

      <div class="navbar-right ">
        <ul class="nav navbar-nav">
          <!-- Github Link Button -->
          <li class="github-link mr-3">
            <a class="btn btn-outline-secondary btn-sm" href="https://www.iassksa.com/iass/ar/" target="_blank">
              <span class="d-none d-md-inline-block mr-2">موقع الاكاديمية</span>
              <i class="mdi mdi-web"></i>
            </a>

          </li>
          <li class="dropdown notifications-menu">
            <button class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-header">الاشعارات</li>
              <li>
                <a href="{{ route('employees.index') }}">
                  <i class="mdi mdi-calendar-clock"></i> مهمة جديدة
                  <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                </a>
              </li>
              <li>
                <a href="{{ route('contacts') }}">
                  <i class="mdi mdi-account-remove"></i> رسالة جديدة
                  <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07 AM</span>
                </a>
              </li>
             
            </ul>
          </li>
          <!-- User Account -->
          <li class="dropdown user-menu">
            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <img src="{{ asset(auth()->user()->image) }}" class="user-image" alt="User Image" />
              <span class="d-none d-lg-inline-block">{{ auth()->user()->name }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <!-- User image -->
              <li class="dropdown-header">
                <img src="{{ asset(auth()->user()->image) }}" class="img-circle" alt="User Image" />
                <div class="d-inline-block">
                  {{ auth()->user()->name }} <small class="pt-1">{{ auth()->user()->email }}</small>
                </div>
              </li>

              <li>
                <a href="{{ url('/') }}">
                  <i class="mdi mdi-account"></i> ملفي الشخصي
                </a>
              </li>
              <li>
                <a href="{{ route('employees.index') }}">
                  <i class="mdi mdi-diamond-stone"></i> مهامي
                </a>
              </li>
              <li>
                <a href="{{ route('contacts') }}"> <i class="mdi mdi-email"></i> بريدي </a>
              </li>
              <li>
                <a href="#"> <i class="mdi mdi-settings"></i> الاعدادات </a>
              </li>

              <li class="dropdown-footer">
                <a href="{{ route('logout') }}"> <i class="mdi mdi-logout"></i> تسجيل خروج </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>


  </header>