<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userpage/message.css') }}">
      <link href="fontawesome-free-6.4.2-web/css/all.min.css" rel="stylesheet">
    <link href="fontawesome-free-6.4.2-web/css/fontawesome.min.css" rel="stylesheet">
</head>
<body>
@include('layout.header')
  <div class="container">
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
            <p class="name">Officer</p>
            <p class="message">.........................</p>
          </div>
        </div>
      </section>
      <section class="chat">
        <div class="header-chat">
          <i class="fa-regular fa-user icons" aria-hidden="true"></i>
          <p class="name">Officer</p>
          <i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>
        </div>
        <div class="messages-chat">
        <div class="border-chat" id="message_ref">

        <!-- This is an HTML comment -->
        @php
// Prepare the combined collection with type indication
$combinedMessages = collect();

// Add the first set of messages
foreach ($messages2 as $message2) {
    $combinedMessages->push((object)[
        'type' => 'message2',
        'message' => $message2->message,
        'created_at' => $message2->created_at,
    ]);
}

// Add the second set of messages
foreach ($messages as $message) {
    $combinedMessages->push((object)[
        'type' => 'message',
        'message' => $message->message,
        'created_at' => $message->created_at,
    ]);
}

// Sort the combined messages by created_at
$sortedMessages = $combinedMessages->sortBy('created_at');

// Get the last 'message' type message
$lastMessage = $sortedMessages->where('type', 'message')->last();
@endphp

<div id="messages-container">
    @foreach ($sortedMessages as $message)
        @if ($message->type === 'message2')
          <div class="message text-only">
                <div class="response">
                    <p class="text">{{ $message->message }}</p>
                </div>
            </div>
        @else
        <div class="message">
            <div class="photo"style="background-image: url('{{ asset('logo/logo.png') }}');">
                    <div class="online"></div>
                </div>
                <p class="text">{{ $message->message }}</p>
            </div>
            <p class="time">{{ $message->created_at->format('H:i') }}</p>
            @if ($message === $lastMessage)
                <p class="response-time time">{{ $message->created_at->format('H:i') }}</p>
            @endif
        @endif
    @endforeach

  </div>
</div>

<!-- This is an HTML comment -->

        </div>
        <form action="{{ route('messages.send') }}" method="POST">
        @csrf
        <div class="footer-chat">
         <input type="hidden" name="room" value="123">
         <input type="hidden" name="receiver_id" value="user">

          <i class="fa-solid fa-paperclip clickable" style="font-size:25pt;" aria-hidden="true"></i>
          <i class="fa-solid fa-camera clickable" style="font-size:25pt;" aria-hidden="true"></i>
          <i class="fa-solid fa-image clickable" style="font-size:25pt;" aria-hidden="true"></i>
          <input type="text" name="message" class="write-message" placeholder="Type your message here"></input>
          <button type="submit" style="background: transparent; border: none; padding: 0; outline: none;">
            <i class="fa-solid fa-paper-plane clickables" aria-hidden="true"></i>
          </button>
        </div>
        </form>
      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        var messagesContainer = document.getElementById("message_ref");
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    });

    $(document).ready(function(){
      setInterval(function(){
            $("#messages-container").load(window.location.href + " #messages-container" );
      }, 1000);
      });
</script>
</body>
</html>