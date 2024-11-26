<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userpage/waitinglist.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
</head>
<body>
@include('layout.header')
<div class="layout">
    <section>
        <div class="layout-min">
            <span><i class="fa-solid fa-download"></i></span>
            <br><br><br>

            @if($caseApproved)
            <div><h1 class="border-line">Thank You For Waiting</h1></div>
            <div><p class="border-line-p">Your Complain has been approved!</p></div>
             @else
             <div><h1 class="border-line">Please Wait </h1></div>
             <div><p class="border-line-p">You are in line</p></div>
             @endif
            <div class="border-line-logo">
                <img src="{{ asset('logo/logo.png') }}" alt="Logo" width="300px" height="auto">
                <aside class="border-line-logo-ref"> 
                    <p>Reference Number </p>
                    @if($case)
                    <h2 id="reference-number">{{ $case->reference_number }}</h2>
                    @endif
                </aside>
            </div>

            <div id="case-status">
                @if($caseApproved)
                    <div class="border-line-greeting">
                        <p>Thank you for your patience!<br> 
                        Your case has been approved.</p>
                    </div>
                    <div class="input-type"> 
                    <form action="{{ route('chat_form') }}" method="post">
                    <input type="hidden" value="{{ session('user_id') }}" name="user_id">
                    <input type="hidden" value="{{ session('user_id') }}" name="reference_number">
                    @if($case)
                    <input type="hidden" value="{{ $case->reference_number }}" name="reference_number">
                    @endif
                        @csrf
                        <button type="submit">Chat Now</button>
                    </form>
                       
                    </div>
                @else
                    <div class="border-line-greeting">
                        <p>Please Wait for your notification!<br> 
                        Your request are currently process and will be over shortly.</p>
                    </div>
                    <br><br><br><br>
                    <div id="loading-indicator">
                        <div class="lds-hourglass"></div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>

@include('layout.footer')

<script>
 $(document).ready(function() {
    var interval = setInterval(function() {
        $.ajax({
            url: "{{ route('checkCaseStatus') }}",
            type: "GET",
            success: function(data) {
                if (data.caseApproved) {
                    $('#case-status').html(`
                        <div class="border-line-greeting">
                            <p>Thank you for your patience!<br> 
                            Your case has been approved.</p>
                        </div>
                        <div class="input-type"> 
                            <a href="{{ url('Message') }}"><button>Chat Now</button></a>
                        </div>
                    `);
                    $('#reference-number').text(data.referenceNumber);

                
                    clearInterval(interval);
                } else {
                    $('#case-status').html(`
                        <div class="border-line-greeting">
                            <p>Thank you for your patience!<br> 
                            Your wait time will be over shortly.</p>
                        </div>
                        <br><br><br><br>
                        <div id="loading-indicator">
                            <div class="lds-hourglass"></div>
                        </div>
                    `);
                }
            }
        });
    }, 10000);
});
</script>

</body>
</html>
