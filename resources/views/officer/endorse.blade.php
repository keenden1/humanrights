@extends('layout.officerheader')

@section('title', 'Endorse')

@section('content')

<div class="float-float">
    <p>COMPLAINS</p>
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

                    <th data-column="title" data-order="desc">Ref. Number<i class="fas fa-sort"></i></th>
                    <th data-column="title" data-order="desc">Date<i class="fas fa-sort"></i></th>
                    <th data-column="title" data-order="desc">Status<i class="fas fa-sort"></i></th>
                    <th >Incharge</th>
                    <th >Endorse Date</th>
                    <th style="text-align: center;">Detail</th>
                    <!-- <th style="text-align: center;">Action</th> -->
                </tr>
            </thead>
            <tbody id="table-body">
            @if($cases->isEmpty())
            <tr>
                <td colspan="8" style="text-align: center;">No Cases</td>
            </tr>
            @else
            @foreach($cases as $case)
                <tr>
                    <!-- <td>{{ $case->created_at->format('g:i A') }}</td> -->
                    <td>{{ $case->reference_number }} </td>
                    <td>{{ $case->created_at->format('M. d, Y') }}</td>
                    <td>{{ $case->status }} </td>
                    <td>{{ $case->in_charge  ?? 'N/A' }} </td>
                    <td>{{ $case->updated_at->format('M. d, Y g:i A') }}</td>
                    <td style="text-align: center;"><button class="open-popup"
                    data-date="{{ $case->created_at->format('M. d, Y') }}" 
                    data-time="{{ $case->created_at->format('g:i A') }}" 
                    data-case="{{ $case->case ?? 'N/A'}}"
                    data-identity="{{ $case->identity }}"
                    data-guardian_name="{{ $case->guardian_name }}"
                    data-relation="{{ $case->relation }}"
                    data-victim_name="{{ $case->victim_name }}"
                    data-age="{{ $case->age }} yrs. old" 
                    data-contact="{{ $case->contact }}"
                    data-gender="{{ $case->gender }}"
                    data-email="{{ $case->email }}"
                    data-status="{{ $case->status }}"
                    data-in_charge="{{ $case->in_charge }}"
                    data-ref="{{ $case->reference_number }}"
                    data-report="{{ $case->report }}"
                    data-assess="{{ $case->summary }}"
                    >Detail</button>
                    <a href="{{ route('printpdf', ['reference_number' => $case->reference_number]) }}" target="_blank">
                    <button>
                        <i class="fa-solid fa-print" style="color: #ffffff;"></i>
                    </button>
                </a>

                </td>
                    <!-- <td style="text-align: center;"> 
                    <form action="{{ route('cases.approve') }}" method="POST">
                        @csrf
                        <input type="hidden" name="reference_number" value="{{ $case->reference_number }}">
                        <button type="submit" class="approval">Accept</button>
                    </form>    
                    </td> -->
                   
                </tr>             
                @endforeach
                @endif
            </tbody>
        </table>
        
    </div>
    @if (session('success'))
    <div class="alert alert-success" id="alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" id="alert-error">
        {{ session('error') }}
    </div>
@endif
</div>
<div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
    <table>
        <tr class="content">
            <th colspan="4" style="text-align: center; margin-top:20px !important;">CASE DETAILS</th>
        </tr>
        <tr class="content2">
            <td  class="table_content">Date</td>
            <td id="popup-date" class="table_content_2"></td>
            <td  class="table_content">Time</td>
            <td id="popup-time"  class="table_content_2"></td>
        </tr>
        <tr class="content2">
            <td  class="table_content">Case</td>
            <td id="popup-case"  class="table_content_2"></td>
            <td  class="table_content">Status</td>
            <td id="popup-status"  class="table_content_2"></td>
        </tr>
        <tr class="content2">
            <td class="table_content">Identity</td>
            <td id="popup-identity" class="table_content_2" ></td>
            <td  class="table_content">Informant Name</td>
            <td id="popup-guardian_name"  class="table_content_2"></td>
        </tr>
        <tr class="content2">
            <td  class="table_content">Relation</td>
            <td id="popup-relation"  class="table_content_2"></td>
            <td class="table_content">Victim Name</td>
            <td id="popup-victim_name" class="table_content_2" ></td>
        </tr>
        <tr class="content2">
         
        </tr>
        <tr class="content2">
            <td class="table_content">Gender</td>
            <td id="popup-gender"  class="table_content_2"></td>
            <td class="table_content">Age</td>
            <td id="popup-age"  class="table_content_2"></td>
        </tr>
        <tr class="content2">
            <td  class="table_content">Contact</td>
            <td id="popup-contact"  class="table_content_2"></td>
            <td class="table_content">Email</td>
            <td id="popup-email"  class="table_content_2"></td>
        </tr>
        <tr class="content2">
        </tr>
        <tr class="content2">
            <td class="table_content">In Charge</td>
            <td id="popup-in-charge"  class="table_content_2"></td>
            <td class="table_content">Reference Number</td>
            <td id="popup-ref"  class="table_content_2"></td>
        </tr>
    </table>
    <div style="color:#333; padding-left:13px;"><h3>Report Summary</h3></div>
    <textarea class="reported" id="popup-report" disabled  style="resize: none;"> </textarea>
    <div style="color:#333; padding-left:13px;"><h3>Recomendation and Assessment</h3></div>
    <textarea class="reported" id="popup-summary" disabled  style="resize: none;"> </textarea>
        <a class="close-popup" id="close-popup" >&times;</a>
    </div>

    <div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 id="centered">ADD WALK-IN</h2>
        <form action="" method="POST">
            @csrf
            @method('PUT') 
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" value="" required>
            </div>
            <div class="form-group">
                <label for="lastname">Middle Name:</label>
                <input type="text" name="middlename" id="middlename" placeholder="optional"  value="" >
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" value="" required>
            </div>
           
            <div class="form-group" id="centered" >
                <button type="submit" style="margin-right: 40px">Update</button>
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
    label, h2{
        color:#333;
    }
    #centered, form{
      
        width: 100%;
        text-align: center;
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
    .alert {
        position: fixed;
        top: 10px;
        right: 140px;
        z-index: 9999;
        padding: 15px;
        border-radius: 5px;
        display: none; 
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .alert-success {
        background-color: #28a745;
        color: white;
    }

    .alert-danger {
        background-color: #dc3545;
        color: white;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the alert elements
        var successAlert = document.getElementById('alert-success');
        var errorAlert = document.getElementById('alert-error');
        
        // Show success alert if it exists
        if (successAlert) {
            successAlert.style.display = 'block';
            successAlert.style.opacity = '1';
            
            // Hide after 3 seconds
            setTimeout(function() {
                successAlert.style.opacity = '0';
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 500); // Give time for opacity transition
            }, 3000);
        }

        // Show error alert if it exists
        if (errorAlert) {
            errorAlert.style.display = 'block';
            errorAlert.style.opacity = '1';
            
            // Hide after 3 seconds
            setTimeout(function() {
                errorAlert.style.opacity = '0';
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 500); // Give time for opacity transition
            }, 3000);
        }
    });
</script>
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
