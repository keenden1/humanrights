
<link rel="stylesheet" type="text/css" href="{{ asset('css/header/header.css') }}">
<link href="fontawesome-free-6.4.2-web/css/all.min.css" rel="stylesheet">
<link href="fontawesome-free-6.4.2-web/css/fontawesome.min.css" rel="stylesheet">
<div id="Main-logo">
    <div class="Main-logo">
        <span>
        <img src="{{ asset('logo/logo.png') }}" alt="" height="80px" width="auto">
        
        </span>
        <span class="Main-logo-title">
        <p style="color: #000;">REPUBLIC OF THE PHILIPPINES</p>
        <h3 style="color: #000;">COMMISION ON HUMAN RIGHTS</h3>
        </span>
    </div>
    <div>
        <nav>
        <a href="{{ url('Homepage') }}" id="tap-tap">Home</a>
        <a href="{{ url('Newsfeed') }}" id="tap-tap">News</a>
        <a href="{{ url('Forum') }}" id="tap-tap">Forum</a>
        <div class="dropdown" id="dropdrop1">
                <a href="" id="dropbtn">Services<i class="fa-solid fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="{{ url('Law ') }}" id="law-book">Reference </a>
                    <a href="{{ url('Complain ') }}" id="complaint">Complaint</a>
                    <!-- <a href="{{ url('# ') }}" id="complaint">Consultation</a> -->
                </div>
        </div>
        <a href="{{ url('AboutUs') }}">About&#160;Us</a>
            @if(Auth::check())
        
        <div class="dropdown" id="dropdrop">
        <a href="" id="dropbtn">
            <i class="fa-solid fa-user"></i>
            <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('logo/logo.png') }}" alt="logo" class="avatar">
        </a>
                <div class="dropdown-content">
                <a href="{{ route('profile.show', session('user_id')) }}" id="complaint">Profile</a>
                    <a href="{{ url('Message') }}" id="law-book">Message</a>
                    <a href="{{ route('logout') }}" id="complaint">Log-out</a>
                </div>
        </div>

                @else
                    <a href="{{ url('Login') }}">Login</a>
                @endif
        </nav>
    </div>
    </section>
    <section class="humburger">
        <div class="hamburger-menu">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
          <span></span>
        </label>
        <ul class="menu__box">
          <li><a class="menu__item" href="{{ url('Homepage') }}">Home</a></li>
          <li><a class="menu__item" href="{{ url('Forum') }}">Forum</a></li>
          <li><a class="menu__item" href="{{ url('Law') }}">Reference</a></li>
          <li><a class="menu__item" href="{{ url('Complain') }}">Complaint</a></li>
          <li><a class="menu__item" href="{{ url('AboutUs') }}">About&#160;Us</a></li>
          @if(Auth::check())
            <li><a class="menu__item" href="{{ route('logout') }}">Logout</a></li>
                @else
            <li><a class="menu__item" href="{{ url('Login') }}">Login</a></li>
                @endif
        </ul>
      </div>
    </section>
</div>

<style>
    .avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    object-fit: cover;
    overflow: hidden;
    display: block;
    margin: auto;
    transform: translateY(23px);
}
</style>
