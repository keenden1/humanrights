 @extends('layout.officerheader')

@section('title', 'Officer-Message')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/officer/message.css') }}">
<div class="float-float">

    <p>Message</p>
</div>
<div class="experiment">
<div class="card-container">

@forelse ($room as $rooms)
    <div class="card">
        <img alt="Portrait of Alexandra Johnson" height="100" src="logo/logo.png" width="100"/>
        <h3>{{ $rooms->room ?? "N/A" }}</h3>
        <p>Head of Human Resources</p>
        <div class="icons">
            <i class="fas fa-comment"></i>
        </div>
    </div>
@empty
    <p>No Message available.</p>
@endforelse




  </div>
</div>
<style>
     .card-container {
        padding-top: 20px;
        display: flex;
        flex-wrap: wrap; /* Allows the cards to wrap onto the next line */
        gap: 20px;
        justify-content: center; /* Centers the cards horizontally */
        border: 2px solid transparent;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            padding: 20px;
            text-align: center;
            width: 200px;
        }
        .card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .card h3 {
            margin: 10px 0 5px;
            font-size: 18px;
            color: #333;
        }
        .card p {
            margin: 0;
            font-size: 14px;
            color: #888;
        }
        .card .icons {
            margin-top: 15px;
            border-top: 1px solid #eee;
            padding-top: 25px;
            padding-right: 15px;
            display: flex;
            justify-content: space-around;
        }
        .card .icons i {
            color: #888;
            cursor: pointer;
            font-size: 32px;
        }
</style>
@endsection
