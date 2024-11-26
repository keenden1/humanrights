<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginpage/changepassword.css') }}">
</head>
<body>
       
<div id="login-panel">
    <section class="login-panel">
            <span>
                <div class="login-panel-head">
                <img src="{{ asset('logo/logo.png') }}" alt="" height="90px" width="auto">
                </div>
                <div class="login-panel-head">
                <p><strong>New Password</strong></p>
                </div>
            </span>
            <span>
                <div class="new-password-div">
                    <p>Please create a new password that<br>you dont use in any other site.</p>
                </div>
            </span>
            <span>
            <form action="{{ route('change.password') }}" method="POST">
                    @csrf
                    
                    <div class="login-input-password">
                        <input type="email" name="email" value="{{ old('email', request()->query('email')) }}" readonly>
                    </div>
                    
                    <div class="login-input-password">
                        <input type="password" name="password" placeholder="Create New Password" required>
                    </div>
                    @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    
                    <div class="login-input-password">
                        <input type="password" name="repeatpassword" placeholder="Confirm Your Password" required>
                    </div>
                    @error('repeatpassword')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    <div class="login-input-button">
                        <button type="submit">Change</button> 
                    </div>
                </form>
            </span>

    </section>
</div>
</body>
<style>
.error-message {
    background-color: #ffe5e5; 
    border: 1px solid #f5c2c2; 
    color: #a94442; 
    padding: 10px;
    border-radius: 4px; 
    margin:0 8px ;
   
}
</style>
</html>