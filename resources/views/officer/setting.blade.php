@extends('layout.officerheader')

@section('title', 'Officer-Setting')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/officer/setting.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/officer/newstyle.css') }}">
<div class="float-float">
    <p>Settings</p>
</div>
<div class="experiment">
<div class="table-container">

<div class="setts">

<div class="center">
<div class="container3">
   <div class="sidebar3">
   <!-- <img src="{{ asset('storage/' . $admin->profile_image) }}" alt="Profile Image" width="100" /> -->

 
   <img alt="Profile picture of a person standing by the sea during sunset" height="100" src="https://storage.googleapis.com/a1aa/image/Sw3yUi2YSAJwBNmWjRv2Tscch8ed2BEOBFBWR52sjhfyiLyTA.jpg" width="100"/>
    <h2>
    {{ $admin->admin_username }} 
    </h2>
    <p>
    {{ $admin->admin_email ?? "N/A"}}
    </p>
    <p>
    {{ $admin->role ?? "N/A"}}
    </p>
    <a class="active" href="#" onclick="showModal()">
     Update Information
    </a>
    <a href="#" style=" pointer-events: none;cursor: not-allowed;">
      <strong>Motto:</strong>
    </a>
    <a href="#" style=" pointer-events: none;cursor: not-allowed;">
    {{ $admin->motto ?? "N/A" }}
    </a>
   </div>
   <div class="content">
    <h3>
     Admin Information
    </h3>
    <p>
     <strong>
      Admin Username:
     </strong>
     {{ $admin->admin_username }} 
    </p>
    <p>
     <strong>
      Email Address:
     </strong>
     {{ $admin->admin_email ?? "N/A"}}
    </p>
    </p>
    <p>
     <strong>
      Role:
     </strong>
     {{ $admin->role ?? "N/A"}}
    </p>
    <p>
     <strong>
      First Name:
     </strong>
     {{ $admin->fname ?? "N/A"}}
    </p>
    <p>
     <strong>
      Midle Name:
     </strong>
     {{ $admin->mname ?? "N/A"}}
    </p>
    <p>
     <strong>
      Lastname:
     </strong>
     {{ $admin->lname ?? "N/A"}}
    </p>
    <p>
     <strong>
      Motto:
     </strong>
     {{ $admin->motto ?? "N/A"}}
    </p>
   
   </div>
  </div>
</div>


</div>


</div>
</div>

<div id="updateModal" class="modal">
    <div class="modal-content" style="color: black;">
        <span class="close" style="color: red;"  onclick="closeModal()">&times;</span>
        <h2>Update Profile</h2>

        @if(session('success'))
            <div class="alert alert-success" style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display validation errors if available -->
        @if($errors->any())
            <div class="alert alert-danger" style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('officer.update') }}" method="POST">
            @csrf
            @method('PUT') 
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" name="firstname" id="firstname" value="{{ $admin->fname }}" required>
            </div>
            <div class="form-group">
                <label for="mname">Middle Name:</label>
                <input type="text" name="middlename" id="middlename"  value="{{ $admin->mname }}" >
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" value="{{ $admin->lname }}" required>
            </div>
            <div class="form-group">
                <label for="motto">Motto:</label>
                <input type="text" name="motto" id="motto" value="{{ $admin->motto }}" >
            </div>
            <div class="form-group">
                <label for="profile_image">Profile Image:</label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*">
            </div>
           
            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
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

     .container3 {
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
        .sidebar3 {
            width: 30%;
            border-right: 1px solid #e0e0e0;
            padding-right: 20px;
            text-align: center;
        }
        .sidebar3 img {
            border-radius: 50%;
            border: 4px solid #007bff;
            width: 100px;
            height: 100px;
        }
        .sidebar3 img:hover {
            border: 4px solid #0056b3; /* Darker blue on hover */
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5); /* Blue glow effect */
        }
        .sidebar3 h2 {
            font-size: 24px;
            margin: 10px 0;
        }
        .sidebar3 p {
            color: #6c757d;
            margin: 5px 0;
        }
        .sidebar3 a {
            display: block;
            margin: 10px 0;
            padding: 10px;
            text-decoration: none;
            color: #000;
            border-radius: 4px;
        }
        .sidebar3 a.active {
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
    .main__avatar{
      background: url('logo/logo.png');
      background-size: cover;
      width: 150px;
      height: 150px;
      display: block;
      margin: 20px auto;
      border-radius: 50%;
      overflow: hidden;
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
@endsection
