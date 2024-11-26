@extends('layout.officerheader')

@section('title', 'Officer-Report')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/officer/report.css') }}">
 <script src="{{ asset('js/admin/officer.js') }}"></script> 
 
<div class="float-float">

    <p>REPORTS</p>
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

                    <th data-column="title" data-order="desc">Date<i class="fas fa-sort"></i></th>
                    <th data-column="title" data-order="desc">Username<i class="fas fa-sort"></i></th>
                    <th data-column="title" data-order="desc">Rating<i class="fas fa-sort"></i></th>
                    <th>details</th>
                    <th>Detail</th>
                    <!-- <th style="text-align: center;">Action</th> -->
                </tr>
            </thead>
            <tbody id="table-body">
            @if($feedback->isEmpty())
            <tr>
                <td colspan="8" style="text-align: center;">No Cases</td>
            </tr>
            @else
            @foreach($feedback as $feedbacks)
            <tr>
                    <td>{{ $feedbacks->created_at->format('M. d, Y') }}</td>
                    <td>{{ $feedbacks->username ?? 'Anonymous'  }} </td>
                    <td>{{ $feedbacks->rating  ?? 'N/A' }}</td>
                    <td>{{ Str::limit($feedbacks->details, 20, '...') ?? 'N/A' }}</td>
                    <td><button>View</button></td>
            </tr>
                   
            @endforeach
            @endif
</div>
</div>


@endsection
