<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>ResetPassword</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginpage/reset.css') }}">
</head>
<body>
<div id="reset-panel">
    <section class="reset-panel">
        <span>
            <div class="reset-panel-head">
                <img src="{{ asset('logo/question.png') }}" alt="" height="90px" width="auto">
            </div>
            <div class="reset-panel-head">
                <p><strong>Reset Password?</strong></p>
            </div>
            @if ($errors->any())
                <div class="error-messages">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="error-message" style="color: red;">
                    {{ session('error') }}
                </div>
            @endif
        </span>
        <span><p>Please Enter Your Email Address</p></span>
        <span>
            <!-- Display any validation errors or success messages -->
      

            <!-- Form to enter email -->
            <form action="{{ route('verify.email') }}" method="GET">
                @csrf
                <div class="reset-input-email">
                    <input type="email" name="email" placeholder="e.g. howard.thurman@gmail.com" required value="{{ old('email') }}">
                </div>
                <hr>
                <div class="reset-input-button">
                    <a href="{{ url('Login') }}">Cancel</a>
                    <button type="submit">Search</button> 
                </div>
            </form>
        </span>
    </section>
</div>
</body>
</html>
