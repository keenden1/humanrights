@extends('layout.lawyerheader')

@section('title', 'Lawyer-Message')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/officer/message.css') }}">
<div class="float-float">

    <p>Message</p>
</div>
<div class="experiment">
<div class="container">
    <br><br><br><br><br>
    <div class="row">
      <section class="discussions">
        <div class="discussion search">
          <div class="searchbar">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input type="text" placeholder="Search..."></input>
          </div>
        </div>


        <div class="discussion message-active">
          <div class="photo"style="background-image: url('{{ asset('logo/logo.png') }}');">
            <div class="online"></div>
          </div>
          <div class="desc-contact">
            <p class="name">Megan Leib</p>
            <p class="message">9 pm at the bar if possible</p>
          </div>
        </div>


        
        
      </section>


      <section class="chat">
        <div class="header-chat">
          <i class="fa-regular fa-user icons" aria-hidden="true"></i>
          <p class="name">Megan Leib</p>
          <i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>
        </div>
        <div class="messages-chat">

        <div class="border-chat">

        <div class="message">
       <!-- ------ -->
        <div class="photo"style="background-image: url('{{ asset('logo/logo.png') }}');">
              <div class="online"></div>
            </div>
            <p class="text">  Hi, how are you ? left </p>
        </div>
        
        <!-- ------ -->
        <p class="time"> 14h58</p>
 

        <div class="message text-only">
            <div class="response">
              <p class="text"> Hey Megan ! It's been a while right</p>
            </div>
          </div>
          <p class="response-time time"> 15h04</p>
        </div>
       


<!-- This is an HTML comment -->

        </div>
        <form>
        <div class="footer-chat">
          <i class="fa-solid fa-paperclip clickable" style="font-size:25pt;" aria-hidden="true"></i>
          <i class="fa-solid fa-camera clickable" style="font-size:25pt;" aria-hidden="true"></i>
          <i class="fa-solid fa-image clickable" style="font-size:25pt;" aria-hidden="true"></i>
          <input type="text" class="write-message"  id="message" name="message" placeholder="Enter message..." autocomplete="off"></input>
              <button type="submit" class="submit-button">
              <i class="fa-solid fa-paper-plane clickables" aria-hidden="true"></i>
            </button>
        </div>
        </form>
      </section>
    </div>
  </div>

</div>

@endsection
