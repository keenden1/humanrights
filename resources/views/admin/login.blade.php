<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/login.css') }}">
    <link href="fontawesome-free-6.4.2-web/css/all.min.css" rel="stylesheet">
    <link href="fontawesome-free-6.4.2-web/css/fontawesome.min.css" rel="stylesheet">
    <script src="{{ asset('js/loginpage/login.js') }}"></script>
</head>
<body5>
    

<div id="login-panel">
    <section class="login-panel">
            <span>
                <div class="login-panel-head">
                <img src="{{ asset('logo/logo.png') }}" alt="" height="90px" width="auto">
                <h6>Commission on Human Rights</h6>
                <p><strong>Welcome Back!</strong></p>
                </div>
            </span>
            <span>
                <form action="{{route('admin.login.post')}}" method="POST">
                @csrf
                @if(session()->has('error'))
                    <div class="handling">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="login-input-email">
                <input type="text" name="admin_username" placeholder="Admin"  required>
                </div>
                <div class="login-input-pass">
                <input type="password" name="admin_password" id="myInput" placeholder="Password" required>
                <i class="fas fa-eye-slash" id="showPasswordIcon" onclick="togglePasswordVisibility()" style="color:white;"></i>
                <i class="fa-solid fa-eye" id="hidePasswordIcon" style="display: none; color:white;" onclick="togglePasswordVisibility()" ></i>
                </div>
                <div class="login-input-button">
                <button type="submit"> Login</button> 
                </div>
                </form>
            </span>
    </section>
</div>
</body5>
</html>