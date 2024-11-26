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
                            <p>{{ $complain }}</p>
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
                            <p>123</p>
                        </span>
                        <span>
                        <i class="fa-solid fa-file-circle-exclamation"></i>
                        </span>
                    </div>
                    </a>



                    <a href=""  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>REPORT</h2>
                            <p>2</p>
                        </span>
                        <span>
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </span>
                    </div>
                    </a>
           
              
        </div>

</div>


@endsection
