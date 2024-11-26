<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginpage/login.css') }}">
    <link href="fontawesome-free-6.4.2-web/css/all.min.css" rel="stylesheet">
    <link href="fontawesome-free-6.4.2-web/css/fontawesome.min.css" rel="stylesheet">
    <script src="{{ asset('js/loginpage/login.js') }}"></script>
</head>
<body>
    
<div id="login-panel" >
    <section class="login-panel">
            <span>
                <div class="login-panel-head">
                <img src="{{ asset('logo/logo.png') }}" alt="" height="90px" width="auto">
                <p><strong>Login</strong></p>
                </div>
            </span>
            <span>
           
                <form action="{{route('user.login.post')}}" method="POST" >
                @csrf
                <!-- Display success or error messages -->
                @if(session('success'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="error-message">
                        {{ session('error') }}
                    </div>
                @endif
                
                <div class="login-input-email">
                <input type="email" name="user_email" required title="Please enter a valid email address">
                <label>Email ID</label>
                </div>

                <div class="login-input-pass">
                <input type="password" name="password" id="myInput" required>
                <label>Password</label>
                <i class="fas fa-eye-slash" id="showPasswordIcon" onclick="togglePasswordVisibility()"></i>
                <i class="fa-solid fa-eye" id="hidePasswordIcon" style="display: none;" onclick="togglePasswordVisibility()"></i>
                </div>
                <div class="login-input-button" style="position:relative;">
                <button type="submit"> Login</button> 
                <a href="{{ url('Reset') }}"  style="position:absolute; bottom:0; left:50%;  transform: translateX(-50%); padding-left:12px;">Forgot Password?</a>
                </div>
                </form>
            </span>
            <span>
                <div class="login-input-account">
                <p>Don't Have an Account? <a href="{{ url('Register') }}">Create New Account</a></p>
                </div>
            </span>
            
    </section>
</div>
</body>
<style>
    .error-message {
    background: #ff4d4d;
    border: 1px solid #f5c2c2; 
    color: #fff; 
    padding: 10px;
    border-radius: 4px; 
    margin:0 8px ;
    margin-bottom: 10px;
}
.success-message {
    background: #28a745; 
    border: 1px solid #f5c2c2; 
    color: white; 
    padding: 10px;
    border-radius: 4px; 
    margin:0 8px ;
    border-radius: 10px;
    margin-bottom: 10px;
}
</style>
</html>
