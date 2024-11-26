@extends('layout.lawyerheader')

@section('title', 'Complaint')

@section('content')
<div class="float-float">
    <p>COMPLAINT FORM</p>
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
                    <th data-column="title" data-order="desc">Interview Date<i class="fas fa-sort"></i></th>
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



                    @if($case->status === 'Endorse')
                    <td style="text-align: center;"> 
                    <form action="{{ route('cases.endorse') }}" method="POST">
                        @csrf
                        <input type="hidden" name="reference_number" value="{{ $case->reference_number }}">
                        <button type="submit" class="approval">Accept</button>
                    </form>    

                    </td>
                    @elseif($case->status === 'Approved')
                    <td style="text-align: center;"> <button class="messaging">Endorse</button></td>
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
    <textarea class="reported" id="popup-report" disabled  style="resize: none;">asd </textarea>
    <div style="color:#333; padding-left:13px;"><h3>Recomendation and Assessment</h3></div>
    <textarea class="reported" id="popup-summary" disabled  style="resize: none;"> </textarea>
        <a class="close-popup" id="close-popup" >&times;</a>
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
</script>

@endsection
