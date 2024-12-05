@extends('layout.legalheader')

@section('title', 'Legal-Head-Dashboard')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/officer/officerdashboard.css') }}">
<div class="float-float">

    <p>DASHBOARD</p>
</div>
<div class="experiment">
    <br><br><br>
<div class="table-container">

                    <a href="{{ url(path: 'Legal-Head-Endorse') }}" class="colors">
                    <div class="box_1">
                        <span>
                            <h2>FORM</h2>
                            <p>{{ $forums }}</p>
                        </span>
                        <span>
                            <i class="fa fa-edit"></i> 
                        </span>
                    </div>
                    </a>

        
                    <a href=""  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>CASE</h2>
                            <p>{{$complain}}</p>
                        </span>
                        <span>
                        <i class="fa-solid fa-file-circle-exclamation"></i>
                        </span>
                    </div>
                    </a>


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
           
              
        </div>

</div>


@endsection
