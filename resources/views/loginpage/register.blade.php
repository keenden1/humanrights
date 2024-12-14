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
                    <div class="register-input-fullname">
                        <input type="text" name="suffix" value="{{ old('suffix') }}">
                        <label>Suffix</label>
                        @error('suffix')
                            <div class="error-message">*{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="register-input-email">
                    <input type="email" name="user_email" value="{{ old('user_email') }}" required title="Please enter a valid email address">
                    <label>Email ID</label>
                    @error('user_email')
                        <div class="error-message">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="register-input-contact">
                    <input type="text" id="contact" name="contact" value="{{ old('contact') }}" pattern="^09\d{0,9}$" maxlength="11" minlength="11" required>
                    <label>Contact Number</label>
                    @error('contact')
                        <div class="error-message">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="register-input-password">
                    <input type="password" id="myInput" name="password" required minlength="8" title="Password must be at least 8 characters long">
                    <label>Password</label>
                    <i class="fas fa-eye-slash" id="showPasswordIcon" onclick="togglePasswordVisibility()"></i>
                    <i class="fa-solid fa-eye" id="hidePasswordIcon" style="display: none;" onclick="togglePasswordVisibility()"></i>
                    @error('password')
                        <div class="error-message">*{{ $message }}</div>
                    @enderror
                </div>

                <div class="register-input-repeatpassword">
                    <input type="password"  id="myInput2" name="confirmpassword" required>
                    <label>Confirm Password</label>
                    <i class="fas fa-eye-slash" id="showPasswordIcon" onclick="togglePasswordVisibility2()"></i>
                    <i class="fa-solid fa-eye" id="hidePasswordIcon" style="display: none;" onclick="togglePasswordVisibility2()"></i>
                    @error('confirmpassword')
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
<script>
    // Select the contact input field
    const contactInput = document.getElementById('contact');

    // Add an event listener for the input event to restrict non-numeric characters
    contactInput.addEventListener('input', function(e) {
        // Allow only numbers and reassign the input value
        this.value = this.value.replace(/[^0-9]/g, '');
    });



    function togglePasswordVisibility() {
    var passwordInput = document.getElementById("myInput");
    var showIcon = document.getElementById("showPasswordIcon");
    var hideIcon = document.getElementById("hidePasswordIcon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showIcon.style.display = "none";
        hideIcon.style.display = "inline-block";
    } else {
        passwordInput.type = "password";
        showIcon.style.display = "inline-block";
        hideIcon.style.display = "none";
    }
}

function togglePasswordVisibility2() {
    var passwordInput = document.getElementById("myInput2");
    var showIcon = document.getElementById("showPasswordIcon2");
    var hideIcon = document.getElementById("hidePasswordIcon2");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showIcon.style.display = "none";
        hideIcon.style.display = "inline-block";
    } else {
        passwordInput.type = "password";
        showIcon.style.display = "inline-block";
        hideIcon.style.display = "none";
    }
}

</script>
</body>
</html>
