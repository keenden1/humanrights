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
          <a  class="site_title"><img src="logo/logo.png" alt=""><span class="hoy"> <p>CHRR1</p></span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="logo/logo.png" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Welcome,</span>
            <h2> @if(session('admin_username'))
                {{ session('admin_username') }}
                   @endif
               
                  </h2>
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
           <hr>
            <ul class="nav side-menu">
              <li><a href="{{ url('Officer-Dashboard') }}"><i class="fa fa-home"></i> Dashboard </a></li>
              <li><a  class="toggle-menu"id="formMenuToggle"><i class="fa fa-edit"></i> Complaint <span class="fa fa-chevron-down"></span></a>
               <ul class="child">
                  <li><a href="{{ url('Officer-Form-9') }}">Form 9</a></li>
                  <li><a href="{{ url('Officer-Form-10') }}">Form 10</a></li>
                  <li><a href="{{ url('Officer-Endorse') }}">Complain</a></li>
                </ul>
              </li>
              <li><a href="{{ url('Officer-Message') }}"><i class="fa-solid fa-users"></i> Message </a></li>
              <li><a href="{{ url('Officer-User-Account') }}"><i class="fa-solid fa-list-check"></i> UserAccount </a></li>
              <li><a href="{{ url('Officer-Reports') }}"><i class="fa-solid fa-file-circle-exclamation"></i> Feedback  </a></li>
              <!-- <li><a href="{{ url('Officer-Forum') }}"><i class="fa-solid fa-chalkboard-user"></i> Forum </a></li> -->
              <li><a  class="toggle-menu"id="formMenuToggle"><i class="fa fa-gear"></i> Settings <span class="fa fa-chevron-down"></span></a>
               <ul class="child">
                  <li><a href="{{ url('Officer-Setting') }}">Profile</a></li>
                  <li><a href="{{ url('Officer-Content') }}">Content</a></li>
                  <li><a href="#">Forum</a></li>
                </ul>
              </li>
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
                <img src="logo/logo.png" alt="">
                 
                @if(session('admin_username'))
               {{ session('admin_username') }}
                   @endif
                
                &nbsp;
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


            <li class="profile_side apple" id="pepper">
              <a href="#" class="dropdown-toggle info-number">
              <i class="fa-regular fa-envelope" style="font-size:24px;"></i>
                <span class="badge bg-green">6</span>
              </a>
              <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                <li>
                  <a>
                    <span>
                          <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span>
                          <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span>
                          <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span>
                          <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span>
                          <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span>
                          <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                  </a>
                </li>
                <!-- <li>
                  <div class="text-center">
                    <a>
                      <strong>Marked as Read</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                </li> -->
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

<style>

.badge {
  position: absolute;
  top: 10px;
  left: -3px;
  background-color: green;
  color: white;
  border-radius: 50%; /* Circle shape */
  width: 20px; /* Adjusted width */
  height: 20px; /* Adjusted height */
  font-size: 12px; /* Adjust font size */
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1;
}

#pepper{
  overflow: visible;
  padding-top: 5px;
  padding-bottom: 2px;
  padding-left: 145px;
  padding-right: 10px;
  position: relative;
}

#menu1 {
  display: none;
}

.profile_side:hover #menu1 {
  display: block; 
}

#menu1 {
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #fff;
  border-radius: 4px;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
  width: 210px;
  z-index: 1000; 
  max-height: 300px; 
  overflow-y: auto; 
  overflow-x: hidden;
}

#menu1 li {
  display: flex;
  align-items: center;
  cursor: pointer;
  transition: background-color 0.3s, padding 0.3s ease-in-out;
  border-radius: 6px; 
  margin: 0 20px;
}


/* Style the name and time */
#menu1 li span {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

#menu1 li span .time {
  font-size: 12px;
  color: #888;
}

/* Hover effect for list items */
#menu1 li:hover {
  background-color: #f1f1f1;

}

/* Message text style */
#menu1 li .message {
  font-size: 14px;
  color: #555;
  margin-top: 4px;
  line-height: 1.4;
  display: -webkit-box;
  -webkit-line-clamp: 2; /* Limit to 2 lines */
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* "See All Alerts" button */
#menu1 li .text-center {
  display: flex;
  justify-content: center;
  padding: 10px;
  margin-top: 10px;
}

#menu1 li .text-center a {
  font-weight: bold;
  color: #4CAF50;
  text-decoration: none;
  font-size: 14px;
  display: flex;
  align-items: center;
}

#menu1 li .text-center a i {

  color: #4CAF50;
}

#menu1 li .text-center a:hover {
  text-decoration: underline;
  color: #45a049;
}
#menu1::-webkit-scrollbar {
  width: 8px; /* Scrollbar width */
}

#menu1::-webkit-scrollbar-track {
  background: #f1f1f1; /* Track color */
  border-radius: 10px;
}

#menu1::-webkit-scrollbar-thumb {
  background: #4CAF50; /* Scrollbar color */
  border-radius: 10px;
}

#menu1::-webkit-scrollbar-thumb:hover {
  background: #45a049; /* Hover color */
}
</style>
</html>
