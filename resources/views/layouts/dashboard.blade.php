<!DOCTYPE html>
<html lang="en" dir="rtl">
  
    @include('includes.head')

  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        @include('includes.aside')

        <div class="page-wrapper">
                    
                @include('includes.header')

            <div class="content-wrapper">
                <div class="content">
                    @yield('content')						 
                </div>
            </div>

                @include('includes.footer')

        </div>
    </div>

     @include('includes.scripts')

  </body>
</html>
