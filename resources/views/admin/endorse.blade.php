@extends('layout.adminheader')

@section('title', 'Endorse')

@section('content')
<div class="float-float">
    <p>ENDORSE FORM</p>
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
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody id="table-body">
            @if($cases->isEmpty())
            <tr>
                <td colspan="7" style="text-align: center;">No Cases</td>
            </tr>
            @else
            @foreach($cases as $case)
                <tr>
                    <td>{{ $case->reference_number }}</td>
                    <td>{{ $case->created_at->format('M. d, Y') }}</td>
                    <td>{{ $case->status }} </td>
                    <td>{{ $case->in_charge  ?? 'N/A' }} </td>
                    <td>{{ $case->updated_at->format('M. d, Y g:i A') }}</td>
                    <td style="text-align: center;"><button class="open-popup"
                    data-date="{{ $case->created_at->format('M. d, Y') }}" 
                    data-time="{{ $case->created_at->format('g:i A') }}" 
                    data-case="{{ $case->case }}"
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
                    >Detail</button></td>
                    <td style="text-align: center;">
                        <button class="approval" onclick="openAssignModal('{{ $case->reference_number }}')">Assign</button>
                    </td>  
  
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


<div class="overlay" id="assign-overlay" style="display: none;"></div>
<div class="assign-popup" id="assign-popup" style="display: none;">
    <h3>Assign Case</h3>
    <form id="assign-form" action="{{ route('admincases.approve') }}" method="POST">
        @csrf
        <label for="reference_number">Reference Number:</label>
        <input type="text" name="reference_number" id="assign-reference-number">
        <label for="assign-to">Assign To a Lawyer:</label>
        <select name="assign_to" id="assign-to" required>
            <option value="">Select a person</option>
            @foreach($staffMembers as $id => $username)
                <option value="{{ $username }}">{{ $username }}</option>
            @endforeach
        </select>
       
        <button type="submit" class="approval">Update</button>
        <button type="button" class="close-popup" onclick="closeAssignModal()">X</button>
    </form>
</div>



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
        <tr>
            <td colspan="4" style="text-align: center;">Report Summary</td>
        </tr>
    </table>
    
    <div style="color:#333; padding-left:13px;"><h3>Report Summary</h3></div>
    <textarea class="reported" id="popup-report" disabled  style="resize: none;"> </textarea>
    <div style="color:#333; padding-left:13px;"><h3>Recomendation and Assessment</h3></div>
    <textarea class="reported" id="popup-summary" disabled  style="resize: none;"> </textarea>

        <a class="close-popup" id="close-popup" >&times;</a>
    </div>
    <style>
         input[type="text"], select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    select:focus, input:focus {
        border-color: #007bff; /* Change border color on focus */
        outline: none; /* Remove outline */
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
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 9998;
    }

    .assign-popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 9999;
    }

    .close-popup {
        margin-top: 10px;
        background-color: #dc3545 !important;
        color: white;
        border: none;
        padding: 10px !important;
        border-radius: 5px;
        font-size: 12px !important;
        cursor: pointer;
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
    function openAssignModal(referenceNumber) {
        // Set the reference number in the hidden input
        document.getElementById('assign-reference-number').value = referenceNumber;

        // Show the modal and overlay
        document.getElementById('assign-popup').style.display = 'block';
        document.getElementById('assign-overlay').style.display = 'block';
    }

    function closeAssignModal() {
        // Hide the modal and overlay
        document.getElementById('assign-popup').style.display = 'none';
        document.getElementById('assign-overlay').style.display = 'none';
    }
</script>
@endsection
