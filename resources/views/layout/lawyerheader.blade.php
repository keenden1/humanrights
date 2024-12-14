<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Officer Dashboard')</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/newdashboard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/officer/newstyle.css') }}">
    <link href="fontawesome-free-6.4.2-web/css/all.min.css" rel="stylesheet">
    <link href="fontawesome-free-6.4.2-web/css/fontawesome.min.css" rel="stylesheet">
    <script src="{{ asset('js/admin/officer.js') }}"></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
</head>
<body class="nav-md">

<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a  class="site_title"><img src="logo/logo.png" alt=""><span class="hoy"> <p>Lawyer</p></span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img class="avatar"
                src="{{ $admin->profile_image ? asset('storage/' . $admin->profile_image) : asset('logo/logo.png') }}">
          </div>
          <div class="profile_info">
            <span>Welcome,</span>
            <h2>{{ $admin->fname }} {{ $admin->lname }}</h2>
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <hr>
            <ul class="nav side-menu">
              <li><a href="{{ url('Lawyer-Dashboard') }}"><i class="fa fa-home"></i> Dashboard </a></li>
              <li><a  class="toggle-menu"id="formMenuToggle"><i class="fa fa-edit"></i> Complaint <span class="fa fa-chevron-down"></span></a>
               <ul class="child">
                  <li><a href="{{ url('Lawyer-Complain') }}">Form</a></li>
                  <li><a href="{{ url('Lawyer-Case') }}">Case</a></li>
                </ul>
              </li>
              <li><a href="{{ url('Lawyer-Message') }}"><i class="fa-solid fa-users"></i> Message </a></li>
              <li><a href="{{ url('Lawyer-Reports') }}"><i class="fa-solid fa-file-circle-exclamation"></i> Report </a></li>

              <li><a href="{{ url('Lawyer-Setting') }}"><i class="fa-solid fa-gear"></i> Settings </a></li>
            </ul>
          </div>

</div>
</div>
</div>
</div>
</div>
<div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle" class="hamburger" onclick="toggleMenu()"><i class="fa fa-bars"></i></a>
          </div>

          <div id="sidebar" class="sidebar">
          <span id="close-btn" class="close-btn" onclick="toggleMenu()">&times;</span>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            </div>






          <ul class="nav navbar-nav navbar-right">
            <li class="profile_side apple">
              <a href="#" class="user-profile" >
                <img
                src="{{ $admin->profile_image ? asset('storage/' . $admin->profile_image) : asset('logo/logo.png') }}">
                {{ session('admin_username') }} &nbsp;
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
                <li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log-Out</a>
                </li>

              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>


    <div class="right_col" role="main">
    @yield('content')
    </div>

</body>


</html>
