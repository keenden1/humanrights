<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/x-icon" href="{{ url('logo/logo.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userpage/homepage.css') }}">
    <script src="{{ asset('js/homepage/homepage.js') }}"></script>

</head>
<body>
@include('layout.header')

<div class="center">
<div class="container">
   <div class="sidebar">
    <img alt="Profile picture of a person standing by the sea during sunset" height="100" src="https://storage.googleapis.com/a1aa/image/Sw3yUi2YSAJwBNmWjRv2Tscch8ed2BEOBFBWR52sjhfyiLyTA.jpg" width="100"/>
    <h2>
    {{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}
    </h2>
    <p>
    {{ $user->user_email }}
    </p>
    <p>
    {{ $user->contact ?? "N/A"}}
    </p>
    <a class="active" href="#" onclick="showModal()">
     Update Information
    </a>
    <a href="#" style=" pointer-events: none;cursor: not-allowed;">
      <strong>Motto:</strong>
    </a>
    <a href="#" style=" pointer-events: none;cursor: not-allowed;">
    {{ $user->motto ?? "N/A" }}
    </a>
   </div>
   <div class="content">
    <h3>
     Profile Information
    </h3>
    <p>
     <strong>
      First Name:
     </strong>
     {{ $user->firstname }} 
    </p>
    <p>
     <strong>
      Midle Name:
     </strong>
     {{ $user->middlename }} 
    </p>
    <p>
     <strong>
      Last Name:
     </strong>
      {{ $user->lastname }}
    </p>
    <p>
     <strong>
      Email Address:
     </strong>
     {{ $user->user_email ?? "N/A"}}
    </p>
    <p>
     <strong>
      Date of Birth:
     </strong>
     {{ $user->birthdate ?? "N/A"}}
    </p>
    <p>
     <strong>
      Age:
     </strong>
     {{ $user->age ?? "N/A"}}
    </p>
    <p>
     <strong>
      Gender:
     </strong>
     {{ $user->gender ?? "N/A"}}
    </p>
    <p>
     <strong>
      Address:
     </strong>
     {{ $user->address ?? "N/A"}}
    </p>
    <p>
     <strong>
      Email Status:
     </strong>
     {{ $user->email_status ?? "N/A"}}
    </p>
   
   </div>
  </div>
</div>
@if (session('success'))
    <div class="alert alert-success" id="successMessage">
        {{ session('success') }}
    </div>
@endif
 
<div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Update Profile</h2>
        <form action="{{ route('profile.update', session('user_id')) }}) }}" method="POST">
            @csrf
            @method('PUT') 
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" value="{{ $user->firstname }}" required>
            </div>
            <div class="form-group">
                <label for="lastname">Middle Name:</label>
                <input type="text" name="middlename" id="middlename" placeholder="optional"  value="{{ $user->Middlename }}" >
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" value="{{ $user->lastname }}" required>
            </div>
            <div class="form-group">
                <label for="user_email">Email Address:</label>
                <input type="text" name="user_email" id="user_email" value="{{ $user->user_email }}" required>
                <div class="error-message" id="error-email"></div>
            </div>
            <div class="form-group">
                <label for="birthdate">Date of Birth:</label>
                <input type="date" name="birthdate" id="birthdate"  value="{{ $user->birthdate }}" >
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" name="age" id="age" value="{{ $user->age }}" required>
            </div>
          
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" value="{{ $user->address }}" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" name="contact" id="contact" value="{{ $user->contact }}" required>
                <div class="error-message" id="error-contact"></div>
            </div>
           
            <div class="form-group">
                <label for="motto">Motto:</label>
                <input type="text" name="motto" id="motto" value="{{ $user->motto }}" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
           
           
            <div class="form-group">
                <button  id="updateButton" type="submit">Update</button>
            </div>
        </form>
         <!-- <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" name="contact" id="contact" value="{{ $user->contact }}" maxLength="11"
                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" >
            </div> -->
    </div>
</div>
@include('layout.footer')
<style>
     .modal {
        display: none; 
        position: fixed; 
        z-index: 100; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4); 
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 10px;
        border: 1px solid #888;
        width: 80%; 
        max-width: 600px;
        border-radius: 8px;
    }
    .modal-content h2 {
    text-align: center;
    margin: 10px 0; 
    }
    .error-message {
    color: red;
    font-size: 0.85em;
    display: none;
    width: 100%;
    padding: 6px;
    margin: 2px;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    padding: 10px;
    border-radius: 4px;
    margin: 15px auto;
    font-size: 1em;
    max-width: 600px;
    text-align: center;
    opacity: 1; /* Default visible state */
    transition: opacity 0.5s ease; /* Smooth fade-out */
    position: fixed;
    top: 20px; /* Adjust as needed */
    left: 50%;
    transform: translateX(-50%);
    z-index: 9999; /* Ensure it stays above other elements */
}



    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        text-decoration: none;
        cursor: pointer;
    }

    /* Form Styling */
    .form-group {
        margin: 10px;
    }

    .form-group input, select{
        width: 100%;
        padding: 6px;
        margin: 2px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .form-group label {
        width: 100%;
        padding: 5px;
    }

    .form-group button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #45a049;
    }
    .center {
        display: flex;
        justify-content: center; 
        align-items: center;
        margin: 50px;
    }
     .container {
            display: flex;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 800px;
            padding: 20px;
            margin: 20px;
            margin-bottom: 50px;
        }
        .sidebar {
            width: 30%;
            border-right: 1px solid #e0e0e0;
            padding-right: 20px;
            text-align: center;
        }
        .sidebar img {
            border-radius: 50%;
            border: 4px solid #007bff;
            width: 100px;
            height: 100px;
        }
        .sidebar img:hover {
            border: 4px solid #0056b3; /* Darker blue on hover */
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5); /* Blue glow effect */
        }
        .sidebar h2 {
            font-size: 24px;
            margin: 10px 0;
        }
        .sidebar p {
            color: #6c757d;
            margin: 5px 0;
        }
        .sidebar a {
            display: block;
            margin: 10px 0;
            padding: 10px;
            text-decoration: none;
            color: #000;
            border-radius: 4px;
        }
        .sidebar a.active {
            background-color: #4CAF50;
            color: #fff;
        }
        .content {
            width: 70%;
            padding-left: 20px;
        }
        .content h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .content p {
            margin: 10px 0;
        }
        .content p strong {
            font-weight: bold;
        }
        @media (max-width: 768px) {
        .container {
            flex-direction: column; /* Stack sidebar and content */
        }

        .sidebar {
            border-right: none;
            border-bottom: 1px solid #e0e0e0;
            padding-right: 0;
            margin-bottom: 20px;
            width: 100% !important;
        }

        .content {
            padding-left: 0;
        }
    }

    @media (max-width: 480px) {
        .sidebar img {
            width: 80px;
            height: 80px;
        }

        .sidebar h2 {
            font-size: 20px;
        }

        .content h3 {
            font-size: 20px;
        }

        .content p {
            font-size: 14px;
        }
    }
</style>
<script>
// JavaScript to open and close the modal
function showModal() {
    document.getElementById("updateModal").style.display = "block";
}

function closeModal() {
    document.getElementById("updateModal").style.display = "none";
}

// Close the modal if clicked outside
window.onclick = function(event) {
    if (event.target == document.getElementById("updateModal")) {
        closeModal();
    }
}

// for input validations
document.addEventListener("DOMContentLoaded", function () {
        const fields = {
            contact: document.getElementById("contact"),
            email: document.getElementById("user_email"),
        };

        const errorMessages = {
            contact: document.getElementById("error-contact"),
            email: document.getElementById("error-email")
        };

        const updateButton = document.getElementById("updateButton");

        // Validation rules
        const validate = {
            contact: value => /^\d{11}$/.test(value) ? '' : 'Contact number must be exactly 11 digits.',
            email: value => /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value) ? '' : 'Please enter a valid email address.'
        };

        // General validation function
        function validateField(field, value) {
            const errorMessage = validate[field](value);
            errorMessages[field].textContent = errorMessage;
            errorMessages[field].style.display = errorMessage ? "block" : "none";
            updateButton.disabled = !!(errorMessages.contact.textContent || errorMessages.email.textContent);
        }

        // Add event listeners for real-time validation
        fields.contact.addEventListener("input", () => validateField("contact", fields.contact.value.trim()));
        fields.email.addEventListener("input", () => validateField("email", fields.email.value.trim()));

        // Initial validation check on page load
        validateField("contact", fields.contact.value.trim());
        validateField("email", fields.email.value.trim());
    });

    // for susccess messsage
    document.addEventListener("DOMContentLoaded", function () {
        const successMessage = document.getElementById("successMessage");

        if (successMessage) {
            // Automatically hide the success message after 3 seconds
            setTimeout(() => {
                successMessage.style.transition = "opacity 0.5s ease"; // Optional fade-out effect
                successMessage.style.opacity = "0";

                setTimeout(() => {
                    successMessage.remove(); // Remove from DOM after fade-out
                }, 500); // Allow fade-out effect to complete before removal
            }, 3000);
        }
    });
</script>
</body>
</html>