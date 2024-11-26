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
<nav class="navbar_navbar">
  <ul>
    <li><a href="#">Profile</a></li>
    <li><a href="#">Content</a></li>
    <li><a href="#">About</a></li>

  </ul>
</nav>

<div class="main">
      <div class="main__content">
      <div class="main__avatar">
        <div class="main__avatar--overlay">
          John Doe
        </div>
      </div>
      <div class="main__settings-form">
        <form action="#" method="post">
          <section class="centered">
          <div>
          <label class="main__input-label">Your name:</label>
          <input class="main__input" type="text" placeholder="John Doe">
          <label class="main__input-label">Your e-mail:</label>
          <input class="main__input" type="text" placeholder="johndoe@gmail.com">
          <label class="main__input-label">Your e-mail for notifications:</label>
          <input class="main__input" type="text" placeholder="johndoe@gmail.com">
          </div>
          <div>
          <label class="main__input-label">Your name:</label>
          <input class="main__input" type="text" placeholder="John Doe">
          <label class="main__input-label">Your e-mail:</label>
          <input class="main__input" type="text" placeholder="johndoe@gmail.com">
          <label class="main__input-label">Your e-mail for notifications:</label>
          <input class="main__input" type="text" placeholder="johndoe@gmail.com">
          </div>
          </section>
        <section class="centered">
        <button class="btn main__save-button">Update</button>
        <!-- <button class="btn main__cancel-button">Cancel</button> -->
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
