<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="icon" type="image/x-icon" href="logo/logo.png">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/loginpage/verify.css') }}">
</head>

<body>
  <div id="verify-panel">
    <section class="verify-panel">
      <span>
        <div class="verify-panel-head">
          <img src="{{ asset('logo/question.png') }}" alt="" height="90px" width="auto">
        </div>
        <div class="verify-panel-head">
          <p><strong>Verification 123</strong></p>
        </div>
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
          <div class="success-message" style="color: #17c400; padding-left: 0.5rem;">
            {{ session('message') }}
          </div>
        @endif
      </span>
      <span>
        <p>Email</p>
      </span>
      <span>
        <form action="{{ route('verify.otp') }}" method="POST">
            @csrf
            <div class="verify-input-email">
              <input type="text" name="email" value="{{ old('user_email', request()->query('email')) }}" readonly>
            </div>

            </span>
            <span>
              <p style="color: #17c400; padding-left: 0.5rem;">Please Enter The Code</p>
            </span>
            <span>

            <div class="verify-input-email">
              <input type="text" name="otp" placeholder="enter code">
            </div>
            <hr>
            <div class="verify-input-button">
              <button type="submit">Verify</button>
            </div>
        </form>
      </span>
      <span>
        <div class="verify-resend-code">
          <p>Didnt reciece code? </p>
          <a href=""><strong>resend now</strong></a>
        </div>
      </span>
    </section>
  </div>
  <style>
    .error-messages {
      background-color: #ffe5e5;
      /* Very light red background */
      border: 1px solid #f5c2c2;
      /* Soft red border */
      color: #a94442;
      /* Darker red text color */
      padding: 10px;
      /* Space inside the box */
      border-radius: 4px;
      /* Slightly rounded corners */

      margin: 0 20px 20px 20px;
    }

    .error-messages ul {
      list-style-type: none;
      /* Remove default list styling */
      padding: 0;
      /* Remove padding */
      margin: 0;
      /* Remove margin */
    }

    .error-messages li {
      margin: 5px 0;
      /* Space between each error message */
    }
  </style>
</body>

</html>
