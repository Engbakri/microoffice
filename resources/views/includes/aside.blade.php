<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="{{ url('/') }}">
          {{-- <svg
            class="brand-icon"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid"
            width="30"
            height="33"
            viewBox="0 0 30 33"
          >
            <g fill="none" fill-rule="evenodd">
              <path
                class="logo-fill-blue"
                fill="#7DBCFF"
                d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
              />
              <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
            </g>
          </svg> --}}
          <img src="{{ asset('images/logo.png') }}" width="50" height="33"/>
          <span class="brand-name"> مستشفى الشمال </span>
        </a>
      </div>
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-scrollbar">

        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
          

          @if(Auth::user()->hasRole('admin'))
            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-view-dashboard-outline"></i>
                <span class="nav-text">لوحة التحكم</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="dashboard"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                      <li >
                        <a class="sidenav-item-link" href="{{ url('/') }}">
                          <span class="nav-text">لوحة التحكم</span>
                        </a>
                      </li>
                    
                </div>
              </ul>
            </li>
                   
            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#tasks"
                aria-expanded="false" aria-controls="tasks">
                <i class="mdi mdi-calendar-clock"></i>
                <span class="nav-text">المهمــــات</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="tasks"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                  
                  
                    
                      <li >
                        <a class="sidenav-item-link" href="{{ url('tasks') }}">
                          <span class="nav-text">المهام</span>
                          
                        </a>
                      </li>
                    
                  

                  
                </div>
              </ul>
            </li>
                    
            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#contacts"
                aria-expanded="false" aria-controls="contacts">
                <i class="mdi mdi-gmail"></i>
                <span class="nav-text">المراســلات</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="contacts"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                  
                  
                    
                  <li >
                    <a class="sidenav-item-link" href="{{ route('inbox') }}">
                      <span class="nav-text">البريد الوارد</span>
                    </a>
                  </li>
                  <li >
                    <a class="sidenav-item-link" href="{{ route('outbox') }}">
                      <span class="nav-text">البريد الصادر</span>
                    </a>
                  </li>
                  <li >
                    <a class="sidenav-item-link" href="{{ route('contacts.create') }}">
                      <span class="nav-text">إنشاء رسالة</span>
                      
                    </a>
                  </li> 
                    
                  

                  
                </div>
              </ul>
            </li>

            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#employees"
                aria-expanded="false" aria-controls="employees">
                <i class="mdi mdi-account-supervisor"></i>
                <span class="nav-text">الموظفين</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="employees"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                  
                  
                    
                      <li >
                        <a class="sidenav-item-link" href="{{ url('users') }}">
                          <span class="nav-text">الموظفين</span>
                          
                        </a>
                      </li>
                    
                  

                  
                </div>
              </ul>
            </li>

            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#roles"
                aria-expanded="false" aria-controls="roles">
                <i class="mdi mdi-chart-pie"></i>
                <span class="nav-text">الصلاحيات</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="roles"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                  
                  
                    
                      <li >
                        <a class="sidenav-item-link" href="{{ url('roles') }}">
                          <span class="nav-text">الصلاحيات</span>
                          
                        </a>
                      </li>
                    
                  

                  
                </div>
              </ul>
            </li>

            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ads"
                aria-expanded="false" aria-controls="ads">
                <i class="mdi mdi-bulletin-board"></i>
                <span class="nav-text">لوحة الاعلان</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="ads"
                data-parent="#sidebar-menu">
                <div class="sub-menu">  
                      <li >
                        <a class="sidenav-item-link" href="{{ route('ads.index') }}">
                          <span class="nav-text">الاعلانات</span>
                        </a>
                      </li>
                         
                </div>
              </ul>
            </li>
            

            @elseif(Auth::user()->hasRole('user'))
            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-view-dashboard-outline"></i>
                <span class="nav-text">لوحة التحكم</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="dashboard"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                      <li >
                        <a class="sidenav-item-link" href="{{ url('/') }}">
                          <span class="nav-text">لوحة التحكم</span>
                        </a>
                      </li>
                    
                </div>
              </ul>
            </li>
            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#tasks"
                aria-expanded="false" aria-controls="tasks">
                <i class="mdi mdi-calendar-clock"></i>
                <span class="nav-text">المهمــــات</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="tasks"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                  
                  
                    
                      <li >
                        <a class="sidenav-item-link" href="{{ url('tasks') }}">
                          <span class="nav-text">التكليف</span>
                          
                        </a>
                        <a class="sidenav-item-link" href="{{ url('employees') }}">
                          <span class="nav-text">المهام</span>
                          
                        </a>
                      </li>
                    
                  

                  
                </div>
              </ul>
            </li>
            
            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#contacts"
                aria-expanded="false" aria-controls="contacts">
                <i class="mdi mdi-gmail"></i>
                <span class="nav-text">البريد</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="contacts"
                data-parent="#sidebar-menu">
                <div class="sub-menu">  
                      <li >
                        <a class="sidenav-item-link" href="{{ route('inbox') }}">
                          <span class="nav-text">البريد الوارد</span>
                        </a>
                      </li>
                      <li >
                        <a class="sidenav-item-link" href="{{ route('outbox') }}">
                          <span class="nav-text">البريد الصادر</span>
                        </a>
                      </li>
                      <li >
                        <a class="sidenav-item-link" href="{{ route('contacts.create') }}">
                          <span class="nav-text">إنشاء رسالة</span>
                          
                        </a>
                      </li>    
                </div>
              </ul>
            </li>
            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ads"
                aria-expanded="false" aria-controls="ads">
                <i class="mdi mdi-bulletin-board"></i>
                <span class="nav-text">لوحة الاعلان</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="ads"
                data-parent="#sidebar-menu">
                <div class="sub-menu">  
                      <li >
                        <a class="sidenav-item-link" href="{{ route('ads.index') }}">
                          <span class="nav-text">الاعلانات</span>
                        </a>
                      </li>
                         
                </div>
              </ul>
            </li>
            @endif
          
        </ul>

      </div>

    
    </div>
  </aside>