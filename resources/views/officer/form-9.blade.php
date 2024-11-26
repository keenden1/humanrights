@extends('layout.officerheader')

@section('title', 'Form-9')

@section('content')
<div class="float-float">
    <p>FORM 9 - COMPLAINT FORM(LEGAL AGE)</p>
</div>
<div class="experiment">

<div class="table-container">
        <div class="table-header">
            
            <div class="search-wrapper">
                <input type="text" id="search-input" placeholder="Search...">
                <button style="margin: 0 20px;">WalkIn+</button>
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
                    <th data-column="title" data-order="desc">Date<i class="fas fa-sort"></i></th>
                    <th data-column="title" data-order="desc">Case<i class="fas fa-sort"></i></th>
                    <th data-column="title" data-order="desc">Victim<i class="fas fa-sort"></i></th>
                    <th data-column="title" data-order="desc">Status<i class="fas fa-sort"></i></th>
                    <th style="text-align: center;">Detail</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody id="table-body">
            @if($cases->isEmpty())
            <tr>
                <td colspan="6" style="text-align: center;">No Cases</td>
            </tr>
            @else
            @foreach($cases as $case)
                <tr>
                    <td>{{ $case->created_at->format('M. d, Y') }}</td>
                    <td>{{ $case->case }}</td>
                    <td>{{ $case->victim_name }}</td>
                    <td>{{ $case->status }}</td>
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
                    data-in_charge="{{ $case->sector }}"
                    data-ref="{{ $case->reference_number }}"
                    data-report="{{ $case->report }}"
                    >Detail</button></td>
                    @if($case->status === 'Processing')
                    <td style="text-align: center;"> 
                    <form action="{{ route('cases.approve') }}" method="POST">
                        @csrf
                        <input type="hidden" name="reference_number" value="{{ $case->reference_number }}">
                        <input type="hidden" name="user_id" value="{{ $case->user_id }}">
                        <button type="submit" class="approval">Accept</button>
                    </form>    

                    </td>
                    @elseif($case->status === 'Interview')
                    <td style="text-align: center;"> 
                    <button class="messaging showPopupButton" data-ref="{{ $case->reference_number }}"
                        data-admin_username="{{ $case->admin_username }}">Endorse</button>

                    <a href="{{ url('Officer-Message') }}" ><button class="messaging">message </button></a>
                    </td>
                    @endif
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
            <th colspan="4" style="text-align: center; margin-top:20px !important;">COMPLAIN DETAILS</th>
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
            <input type="hidden" id="popup-summary" >
        </tr>
        <tr class="content2">
        </tr>
        <tr class="content2">
            <td class="table_content">Sector</td>
            <td id="popup-in-charge"  class="table_content_2"></td>
            <td class="table_content">Ref. Number</td>
            <td id="popup-ref"  class="table_content_2"></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center; font-weight:bold;">Report Summary</td>
        </tr>
    </table>
    
    <div class="reported"> <p id="popup-report" ></p></div>
        <a class="close-popup" class="messaging" id="close-popup" >&times;</a>
    </div>

    <div id="popupOverlay" class="popup-overlay"></div>
    <div id="popupContainer" class="popup-container">
        <h2>SUMMARY REPORT</h2>
        <div class="form-group">
        <form action="{{ route('Officer-Summary') }}" method="POST">
            @csrf
            <input type="hidden" name="reference_number" id="referenceNumber">
            <input type="hidden" name="admin_username" value="{{ session('admin_username') }}">
        <textarea
                id="report"
                class="form-control input-textarea"
                name="report"
                placeholder="Report Summary "  
                rows="5"        
                required       
                ></textarea>
                    </div>
                <button id="submitButton" type="submit">Submit</button>
                <button id="hidePopupButton">Close</button>
        </form>
    
    </div>
    <style>


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


    document.addEventListener('DOMContentLoaded', function () {
    const referenceNumberInput = document.getElementById('referenceNumber');

    // Attach event listener to all buttons with the "showPopupButton" class
    const showPopupButtons = document.querySelectorAll('.showPopupButton');
    showPopupButtons.forEach(button => {
        button.addEventListener('click', function () {
            const referenceNumber = this.getAttribute('data-ref');
            referenceNumberInput.value = referenceNumber;

            document.getElementById('popupOverlay').classList.add('show');
            document.getElementById('popupContainer').classList.add('show');
        });
    });

    // Close button logic
    document.getElementById('hidePopupButton').onclick = function () {
        document.getElementById('popupOverlay').classList.remove('show');
        document.getElementById('popupContainer').classList.remove('show');
    };
});


</script>

@endsection
