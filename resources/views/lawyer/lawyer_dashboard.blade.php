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

                    <a href="" class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Reports</h2>
                            <p>123</p>
                        </span>
                        <span>
                            <i class="fa fa-edit"></i> 
                        </span>
                    </div>
                    </a>
                    <a href=""  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Message</h2>
                            <p>123</p>
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
                            <p>123</p>
                        </span>
                        <span>
                            <i class="fa-solid fa-list-check"></i>
                        </span>
                    </div>
                    </a>
  
        </div>

</div>


@endsection
