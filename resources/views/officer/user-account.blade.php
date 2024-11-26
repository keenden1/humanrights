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
                    <th  data-column="date" data-order="desc">Full Name <i class="fas fa-sort"></i></th>
                    <th data-column="time" data-order="desc">Username <i class="fas fa-sort"></i></th>
                    <th data-column="title" data-order="desc">Email <i class="fas fa-sort"></i></th>
                    <th data-column="charge" data-order="desc">Email Status <i class="fas fa-sort"></i></th>
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
                    <td>{{ ucwords($users->firstname . ' ' . $users->middlename . ' ' . $users->lastname) }}</td>
                    <td>{{ $users->username }}</td>
                    <td>{{ $users->user_email }}</td>
                    <td>{{ $users->email_status ?? 'Not Verified' }}</td>
                    <td style="text-align: center;">
                    <button class="open-popup">Detail</button>
                    </td>
                </tr>             
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

</div>
<div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
    <table>
            <tr class="content">
                <th colspan="5" style="text-align: center; margin-top:20px !important;">BULLYING</th>
            </tr>
            <tr class="content2">
                <td style="padding-right:150px!important;">date</td>
                <td style="padding-left:50px!important;">12-12-12</td>
            </tr>
            <tr class="content2">
                <td style="padding-right:150px !important;">Time</td>
                <td style="padding-left:50px!important;">6:01am</td>
            </tr>
            <!-- Add more rows as needed -->
        </table>
        <a class="close-popup" id="close-popup" >&times;</a>
    </div>


@endsection
