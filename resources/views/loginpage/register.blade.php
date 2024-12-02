<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginpage/register.css') }}">
    <link href="fontawesome-free-6.4.2-web/css/all.min.css" rel="stylesheet">
    <link href="fontawesome-free-6.4.2-web/css/fontawesome.min.css" rel="stylesheet">
    <script src="{{ asset('js/loginpage/register.js') }}"></script>
</head>
<body>
<div id="register-panel">
    <section class="register-panel">
        <a id="register-link-icon" href="{{ url('Login') }}"><i id="register-back-icon" class="fa-solid fa-arrow-left"></i></a>
        <span>
            <div class="register-panel-head">
                <img src="{{ asset('logo/logo.png') }}" alt="" height="90px" width="auto">
                <p><strong>Register</strong></p>
            </div>
        </span>

        <span>
            <form action="{{ route('register_post') }}" method="POST">
                @csrf
                @if(session()->has('error'))
                    <span class="handling">
                        {{ session('error') }}
                    </span>
                @endif
                <div class="register-input-fullname-div">
                    <div class="register-input-fullname">
                        <input type="text" name="firstname" value="{{ old('firstname') }}" required>
                        <label>First name</label>
                        @error('firstname')
                            <div class="error-message">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="register-input-fullname">
                        <input type="text" name="middlename" value="{{ old('middlename') }}">
                        <label>M.I.</label>
                        @error('middlename')
                            <div class="error-message">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="register-input-fullname">
                        <input type="text" name="lastname" value="{{ old('lastname') }}" required>
                        <label>Last name</label>
                        @error('lastname')
                            <div class="error-message">*{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="register-input-username">
                    <input type="text" name="username" value="{{ old('username') }}" required minlength="5">
                    <label>Username</label>
                    @error('username')
                        <div class="error-message">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="register-input-email">
                    <input type="email" name="user_email" value="{{ old('user_email') }}" required title="Please enter a valid email address">
                    <label>Email ID</label>
                    @error('user_email')
                        <div class="error-message">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="register-input-contact">
                    <input type="text" name="contact" value="{{ old('contact') }}" pattern="^09\d{0,9}$" maxlength="11" minlength="11" required>
                    <label>Contact Number</label>
                    @error('contact')
                        <div class="error-message">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="register-input-password">
                    <input type="password" name="password" required minlength="8" title="Password must be at least 8 characters long">
                    <label>Password</label>
                    @error('password')
                        <div class="error-message">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="register-input-repeatpassword">
                    <input type="password" name="repeatpassword" required>
                    <label>Repeat Password</label>
                    @error('repeatpassword')
                        <div class="error-message">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="register-input-button">
                    <button type="submit">Register</button>
                </div>
            </form>
        </span>
    </section>
</div>
<style>
    .error-message {
    color: #3498db;
    font-size: 0.9rem;
    margin-top: 5px;
    padding: 5px;
}
</style>
</body>
</html>
