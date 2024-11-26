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
    {{ $user->username }} 
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
      Name:
     </strong>
     {{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}
    </p>
    <p>
     <strong>
      Email Address:
     </strong>
     {{ $user->email ?? "N/A"}}
    </p>
    <p>
     <strong>
      Date of Birth:
     </strong>
     {{ $user->birthdate ?? "N/A"}}
    </p>
    <p>
     <strong>
      Gender:
     </strong>
     {{ $user->gender ?? "N/A"}}
    </p>
    <p>
     <strong>
      Age:
     </strong>
     {{ $user->age ?? "N/A"}}
    </p>
    <p>
     <strong>
      Height:
     </strong>
     {{ $user->height ?? "N/A"}}
    </p>
    <p>
     <strong>
      Weight:
     </strong>
     {{ $user->weight ?? "N/A"}}
    </p>
    <p>
     <strong>
      Address:
     </strong>
     {{ $user->weight ?? "N/A"}}
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
                <button type="submit">Update</button>
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
        z-index: 1; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4); 
        padding-top: 60px;
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%; 
        max-width: 600px;
        border-radius: 8px;
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
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Form Styling */
    .form-group {
        margin: 15px;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
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
</script>
</body>
</html>