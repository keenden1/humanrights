@extends('layout.adminheader')

@section('title', 'User-Account')

@section('content')

<div class="float-float">
    <p>EMPLOYEE ACCOUNT</p>
</div>
<div class="experiment">

<div class="table-container">
        <div class="table-header">
            <div class="search-wrapper">
                <input type="text" id="search-input" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
            <div class="view-options">
                <button class="btn" onclick="showModal()">Add Employee <i class="fa-solid fa-plus"></i></button>
            </div>
        </div>
        <table id="employee-table">
            <thead>
                <tr>
                    <th  data-column="date" data-order="desc">Full Name <i class="fas fa-sort"></i></th>
                    <th data-column="time" data-order="desc">Username <i class="fas fa-sort"></i></th>
                    <th data-column="title" data-order="desc">Email <i class="fas fa-sort"></i></th>
                    <th data-column="status" data-order="desc">Role <i class="fas fa-sort"></i></th>
                    <th data-column="status" data-order="desc">Status <i class="fas fa-sort"></i></th>
                    <th style="text-align: center;">Detail</th>
                </tr>
            </thead>
            <tbody id="table-body">
            @if($user->isEmpty())
            <tr>
                <td colspan="6" style="text-align: center;">No Cases</td>
            </tr>
            @else
            @foreach($user as $users)
                <tr>
                    <td>{{ ucwords($users->admin_username ) }}</td>
                    <td>{{ $users->admin_username }}</td>
                    <td>{{ $users->email ?? 'none'}}</td>
                    <td>{{ $users->role }}</td>
                    <td>{{ $users->status }}active</td>
                    <td style="text-align: center;">
                    <button class="open-popup">Detail</button>
                    </td>
                </tr>             
                @endforeach
            @endif
            </tbody>
        </table>
    </div>


    
    <div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Update Profile</h2>
        <form action="" method="POST">
            @csrf
            @method('PUT') 
            
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required readonly>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" name="password" id="password" required readonly>
            </div>

            <div class="form-group">
                <label for="email_domain">Role</label>
                <select id="email-domain" name="email_domain" class="form-control">
                    <option value="" disabled selected>Select Role</option>
                    <option value="head">Head admin</option>
                    <option value="lawyer">Lawyer</option>
                    <option value="officer">Officer</option>
                </select>
            </div>

            <div class="form-group button-group">
                <button type="button" onclick="generateRandomCredentials()">Generate Credentials</button>
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</div>


</div>

<style>
    .btn {
    background-color: #28a745; /* Green background */
    color: white; /* White text */
    border: none; /* No border */
    padding: 8px 16px; /* Padding for size */
    font-size: 14px; /* Font size */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    margin-left: 20px;
}

.btn:hover {
    background-color: #218838; /* Darker green on hover */
}

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

    .form-group input, 
.form-group select {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px; 
}


.form-group select:hover {
    border-color: #888; 
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
    .button-group {
    display: flex; /* Use flexbox */
    justify-content: space-between; /* Space between the buttons */
    margin-top: 20px; /* Optional: Add some space above the button group */
}

.button-group button {
    padding: 10px 15px; /* Add padding for better appearance */
    border: none; /* Remove default border */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
}

.button-group button:first-child {
    background-color: #007bff; /* Blue background for the first button */
    color: white; /* White text */
}

.button-group button:first-child:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

.button-group button:last-child {
    background-color: #28a745; /* Green background for the second button */
    color: white; /* White text */
}

.button-group button:last-child:hover {
    background-color: #218838; /* Darker green on hover */
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
<script>
function generateRandomCredentials() {
    // Generate a random username
    const randomUsername = 'chr_' + Math.floor(Math.random() * 10000); // Generates a username like user1234
    document.getElementById('username').value = randomUsername;

    // Generate a random password
    const randomPassword = Math.random().toString(36).slice(-8); // Generates a random password of 8 characters
    document.getElementById('password').value = randomPassword;
}
</script>
@endsection
