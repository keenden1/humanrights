@extends('layout.adminheader')

@section('title', 'Admin-Setting')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/officer/setting.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/officer/newstyle.css') }}">
<div class="float-float">
    <p>Settings</p>
</div>
<div class="experiment">
<div class="table-container">

<div class="setts">
<!-- <nav class="navbar_navbar">
  <ul>
    <li><a href="#">Profile</a></li>
    <li><a href="#">Content</a></li>
    <li><a href="#">About</a></li>

  </ul>
</nav> -->

<div class="main">
      <div class="main__content">
      <div class="main__avatar">
        <div class="main__avatar--overlay">
        {{ $admin->admin_username }}
        </div>
      </div>
      <div class="main__settings-form">
      @if(session('success'))
            <div class="alert alert-success" style="color: #8ED081;">
                <strong>{{ session('success') }}</strong> 
            </div>
        @endif

        <!-- Display validation errors if available -->
        @if($errors->any())
            <div class="alert alert-danger" style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.update') }}" method="POST">
        @csrf
        @method('PUT') 
          <section class="centered">
          <div>
                    <label class="main__input-label">First name:</label>
                    <input class="main__input" type="text" name="firstname" id="firstname" value="{{ $admin->fname }}" required>

                    <label class="main__input-label">Your e-mail:</label>
                    <input class="main__input" type="text" name="email" id="email" value="{{ $admin->admin_email }}" required>
                    
          </div>
          <div>
                    <label class="main__input-label">Middle Name:</label>
                    <input class="main__input" type="text" name="middlename" id="middlename" value="{{ $admin->mname }}">

                    <label class="main__input-label">Username:</label>
                    <input class="main__input" type="text" name="motto" id="motto" value="{{ $admin->admin_username }}">
          </div>

          <div>
                  <label class="main__input-label">Last Name:</label>
                  <input class="main__input" type="text" name="lastname" id="lastname" value="{{ $admin->lname }}" required>
                  
                  <label class="main__input-label">Motto:</label>
                    <input class="main__input" type="text" name="motto" id="motto" value="{{ $admin->motto }}">
          </div>
          </section>
          <section class="centered">
                <button class="btn main__save-button" type="submit">Update Information</button>
            </section>
         
        </form>
      </div>
    </div>
  </div>

</div>





</div>
</div>
<style>
    .main__avatar{
      background: url('logo/logo.png');
      background-size: cover;
      width: 150px;
      height: 150px;
      display: block;
      margin: 20px auto;
      border-radius: 50%;
      overflow: hidden;
    }
</style>

@endsection
