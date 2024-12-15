@extends('layout.officerheader')

@section('title', 'User-Account')

@section('content')

<div class="float-float">
    <p>USER ACCOUNT</p>
</div>
<div class="experiment">

    <div class="table-container">
        <div class="table-header">
            <div class="search-wrapper">
                <input type="text" id="search-input" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
            <div class="view-options">
                <label for="rows-select">Show rows:</label>
                <select id="rows-select">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>
        <table id="employee-table">
            <thead>
                <tr>
                    <th data-column="date" data-order="desc">Full Name <i class="fas fa-sort"></i></th>
                    <th data-column="time" data-order="desc">Username <i class="fas fa-sort"></i></th>
                    <th data-column="title" data-order="desc">Email <i class="fas fa-sort"></i></th>
                    <th data-column="charge" data-order="desc">Email Status <i class="fas fa-sort"></i></th>
                    <th style="text-align: center;">Details</th>
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
                    <td>{{ ucwords($users->firstname . ' ' . $users->middlename . ' ' . $users->lastname) }}</td>
                    <td>{{ $users->username }}</td>
                    <td>{{ $users->user_email }}</td>
                    <td>{{ $users->email_status ?? 'Not Verified' }}</td>
                    <td style="text-align: center;">
                    <button class="open-direct-popup" 
                            data-user-id="{{ $users->id }}" 
                            data-user-username="{{ $users->username }}" 
                            data-user-email="{{ $users->user_email }}" 
                            data-user-status="{{ $users->email_status ?? 'Not Verified' }}"
                            data-user-firstname="{{ $users->firstname }}"
                            data-user-middlename="{{ $users->middlename }}"
                            data-user-lastname="{{ $users->lastname }}"
                            data-user-suffix="{{ $users->suffix }}"
                            data-user-birthdate="{{ $users->birthdate }}"
                            data-user-age="{{ $users->age }}"
                            data-user-contact="{{ $users->contact }}"
                            data-user-height="{{ $users->height }}"
                            data-user-weight="{{ $users->weight }}"
                            data-user-motto="{{ $users->motto }}"
                            data-user-gender="{{ $users->gender }}"
                            data-user-address="{{ $users->address }}">
                        Details
                    </button>

                    </td>
                </tr>             
            @endforeach
            @endif
            </tbody>
        </table>
    </div>

</div>

<div class="overlay" id="direct-overlay"></div>
<div class="direct-popup" id="direct-popup">
    <h3>User Information</h3>
    <table>
        <tr>
            <td><strong>First Name:</strong></td>
            <td id="direct-firstname"></td>
        </tr>
        <tr>
            <td><strong>Middle Name:</strong></td>
            <td id="direct-middlename"></td>
        </tr>
        <tr>
            <td><strong>Last Name:</strong></td>
            <td id="direct-lastname"></td>
        </tr>
        <tr>
            <td><strong>Suffix:</strong></td>
            <td id="direct-suffix"></td>
        </tr>
        <tr>
            <td><strong>Birthdate:</strong></td>
            <td id="direct-birthdate"></td>
        </tr>
        <tr>
            <td><strong>Age:</strong></td>
            <td id="direct-age"></td>
        </tr>
        <tr>
            <td><strong>Username:</strong></td>
            <td id="direct-username"></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td id="direct-user-email"></td>
        </tr>
        <tr>
            <td><strong>Email Status:</strong></td>
            <td id="direct-user-status"></td>
        </tr>
        <tr>
            <td><strong>Contact:</strong></td>
            <td id="direct-contact"></td>
        </tr>
        <tr>
            <td><strong>Height:</strong></td>
            <td id="direct-height"></td>
        </tr>
        <tr>
            <td><strong>Weight:</strong></td>
            <td id="direct-weight"></td>
        </tr>
        <tr>
            <td><strong>Motto:</strong></td>
            <td id="direct-motto"></td>
        </tr>
        <tr>
            <td><strong>Gender:</strong></td>
            <td id="direct-gender"></td>
        </tr>
        <tr>
            <td><strong>Address:</strong></td>
            <td id="direct-address"></td>
        </tr>
    </table>
    <a class="close-popup" id="close-direct-popup">&times;</a>
</div>

@endsection

@section('styles')
    <style>
        /* Modal Overlay */
/* .overlay {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    width: 60%;
    height: 60%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 100;
    transform: translate(-50%, -50%); 
} */

/* Full-Width Direct Modal */
.direct-popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    width: 60%;
    height: 60%; /* Take up full height as well */
    background-color: #ffffff;
    padding: 20px;
    box-sizing: border-box;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 100;
    overflow-y: auto; /* Allow scrolling if content is too long */
    transition: opacity 0.3s ease;
    transform: translate(-50%, -50%); 
}

/* Style for the <h3> heading */
.direct-popup h3 {
    display: block; /* Ensure it's visible */
    text-align: center; /* Center the heading text */
    margin-bottom: 20px; /* Add space below the heading */
    font-size: 24px; /* Set the font size */
    font-weight: bold; /* Ensure it's bold */
    color: #333; /* Set a readable color */
}

/* Table inside the modal */
.direct-popup table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

/* Table cells */
.direct-popup td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

/* Close button */
.close-direct-popup {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 24px;
    color: #333;
    cursor: pointer;
}

.close-direct-popup:hover {
    color: red;
}


    </style>
@endsection


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const openDirectPopupButtons = document.querySelectorAll('.open-direct-popup');
    const directOverlay = document.getElementById('direct-overlay');
    const directPopup = document.getElementById('direct-popup');
    const closeDirectPopup = document.getElementById('close-direct-popup');

    openDirectPopupButtons.forEach(button => {
        button.addEventListener('click', () => {
            directOverlay.style.display = 'block';
            directPopup.style.display = 'block';

            // Get the user data from button attributes
            const userId = button.getAttribute('data-user-id');
            const userUsername = button.getAttribute('data-user-username');
            const userEmail = button.getAttribute('data-user-email');
            const userStatus = button.getAttribute('data-user-status');

            // Populate the modal with the relevant data
            document.getElementById('direct-username').textContent = userUsername;
            document.getElementById('direct-user-email').textContent = userEmail;
            document.getElementById('direct-user-status').textContent = userStatus;

            // If you have more data to pass (like firstname, lastname), include them similarly
            document.getElementById('direct-firstname').textContent = button.getAttribute('data-user-firstname');
            document.getElementById('direct-middlename').textContent = button.getAttribute('data-user-middlename');
            document.getElementById('direct-lastname').textContent = button.getAttribute('data-user-lastname');
            document.getElementById('direct-suffix').textContent = button.getAttribute('data-user-suffix');
            document.getElementById('direct-birthdate').textContent = button.getAttribute('data-user-birthdate');
            document.getElementById('direct-age').textContent = button.getAttribute('data-user-age');
            document.getElementById('direct-contact').textContent = button.getAttribute('data-user-contact');
            document.getElementById('direct-height').textContent = button.getAttribute('data-user-height');
            document.getElementById('direct-weight').textContent = button.getAttribute('data-user-weight');
            document.getElementById('direct-motto').textContent = button.getAttribute('data-user-motto');
            document.getElementById('direct-gender').textContent = button.getAttribute('data-user-gender');
            document.getElementById('direct-address').textContent = button.getAttribute('data-user-address');
        });
    });

    closeDirectPopup.addEventListener('click', () => {
        directPopup.style.display = 'none';
        directOverlay.style.display = 'none';
    });

    directOverlay.addEventListener('click', () => {
        directPopup.style.display = 'none';
        directOverlay.style.display = 'none';
    });
});

</script>
