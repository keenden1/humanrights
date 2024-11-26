<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginpage/reset.css') }}">
</head>
<body>
<div id="reset-panel">
    <section class="reset-panel">
        <span>
            <div class="reset-panel-head">
                <img src="{{ asset('logo/logo.png') }}" alt="" height="90px" width="auto">
            </div>
            <div class="reset-panel-head">
                <p><strong>VERIFY YOUR EMAIL</strong></p>
            </div>
        </span>
        <span><p>Please Enter Your Email Address</p></span>
        <span>
        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message'))
        <div class="success-message" style="color: green;">
            {{ session('message') }}
        </div>
        @endif
            <form action="{{ route('send.otpauth') }}" method="POST">
                @csrf
                <div class="reset-input-email">
                <input type="email" name="user_email" value="{{ session('user_email') }}" placeholder="e.g. howard.thurman@gmail.com" required readonly>
                </div>
                <hr>
                <div class="reset-input-button">
                    <button type="submit">Send Code</button> 
            </form>
                    <a href="{{ url('logout') }}">Logout</a>
                </div>
        </span>
    </section>
</div>
</body>
</html>
