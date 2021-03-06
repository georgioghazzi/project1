
<!-- Custom CSS -->
<link href="{{ asset('css/backend_css/dashboard.css') }}" rel="stylesheet">

<!-- Bootstrap -->
<link href="{{ asset('css/backend_css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
<!-- FontAwesome -->
<link href="{{ asset('css/backend_css/FontAwesome/all.min.css') }}" rel="stylesheet">
<title>Konchef - Admin Panel</title>


    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('admin.dashboard') }}">Admin Panel</a>
      <h3 class="wb">Welcome Back {{ Auth::user()->name }} </h3>
      <ul class="navbar-nav px-3">
      <li class="dropdown">

                                    
                                        <a class="logout" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
      </ul>
    </nav>

<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a  class="nav-link" href="{{ route('admin.dashboard') }}">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              @if(Auth::user()->user_type == "chef" || Auth::user()->user_type == "admin")
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.recipes') }}">
                  <span data-feather="file"></span>
                  Recipes
                </a>
              </li>
              @endif
              @if(Auth::user()->user_type == "staff" || Auth::user()->user_type == "admin")
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.orders') }}">
                  <span data-feather="shopping-cart"></span>
                  Orders
                </a>
              </li>
              @endif
              @if(Auth::user()->user_type == "admin")
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users') }}">
                  <span data-feather="users"></span>
                  Users
                </a>
              </li>    
              @endif       
                   </nav>

                         @yield('content')


                             <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js')  }}"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

   
  </body>
</html>
