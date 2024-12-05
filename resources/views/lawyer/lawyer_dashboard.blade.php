@extends('layout.lawyerheader')

@section('title', 'Dashboard')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/officer/officerdashboard.css') }}">
<div class="float-float">

    <p>DASHBOARD</p>
</div>
<div class="experiment">
    <br><br><br>
<div class="table-container">

<a href=""  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Legal Age Report</h2>
                            <h3> Male: {{$maleLegalCount}}</h3>
                            <h3> Female: {{$femaleLegalCount}} </h3>
                        </span> 
                    </div>
                    </a>
                    <a href=""  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Minor Age Report</h2>
                            <h3> Male: {{$maleMinorCount}}</h3>
                            <h3> Female: {{$femaleMinorCount}} </h3>
                        </span> 
                    </div>
                    </a>
                    <a href=""  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Message</h2>
                            <p>{{$message}}</p>
                        </span>
                        <span>
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </span>
                    </div>
                    </a>
                    <a href=""  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Case</h2>
                            <p>{{$complain}}</p>
                        </span>
                        <span>
                            <i class="fa-solid fa-list-check"></i>
                        </span>
                    </div>
                    </a>
  
        </div>

</div>


@endsection
