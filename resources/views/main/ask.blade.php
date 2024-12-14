<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userpage/forum.css') }}">
</head>
<body>
@include('layout.header')

<div class="container">
  <!-- <p class="style">Scroll</p> -->
<div class="toggle-button-cover">
<div class="form"><p>History </p> <p> <!-- |</p> <p> Titles </p> --> <p> | &nbsp</p> <p><a href="#" onclick="showModalone()" style="text-decoration:none; color:#006699;">Add Question</a>
  </p> </div>


  <div id="updateModalone" class="modal" style="padding-bottom: 1000px;">
    <div class="modal-content">
        <span class="close" onclick="closeModalone()">&times;</span>
        <h2 id="centered">Question</h2>
        <form action="{{ route('ask.question') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="case">Title:</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div class="form-group">
        <textarea name="question" id="input-message" placeholder="Question" required
                  style="width: 100%; height:20vh; padding-right:10px;"></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image:
            <span style="font-style: italic; color: #888; font-size: 12px; padding-left: 5px;">(optional)</span>
        </label>
        <input type="file" name="image" id="image" onchange="displayImage('image', 'image_display_1')">
        <img id="image_display_1" style="display:none; width: 400px; height: auto;" alt="Image Preview">
    </div>
    <input type="hidden" name="email" value="{{ session('user_email') ?? null }}">
    <div class="form-group" id="centered">
        <button type="submit" style="margin-right: 40px">Submit</button>
    </div>
</form>
        </div>
        </div>

      <!-- <div class="button-cover">
        <div class="button r" id="button-3">
          <input type="checkbox" class="checkbox" id="autoScrollToggle"/>
          <div class="knobs"></div>
          <div class="layer"></div>
        </div> 
      </div> -->
  </div>
<div class="scroll" onLoad="autoScroll()">
@forelse($ask as $item)
<table dir="ltr" style="width:100%">
  <tbody>
    <tr>
      <td style="margin:0;padding:0 0 0 16px;text-align:left;vertical-align:top;">
        <p style="color:#8f8f8f;line-height:1.3;margin: 20px 0 0 0;">
        {{ $item->created_at->format('F d, Y h:i A') }}

        </p>
      </td>
    </tr>
  </tbody>
</table>

<table dir="ltr" style="vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="padding:0 8px 8px 16px; text-align:left; width:100%;">
        <h2 style="font-size:18px;font-weight:400;line-height:1.3;margin:0;padding:0;word-wrap:normal">
          <a href="#" style="text-decoration: none; font-weight: bold; color: #006699; font-weight:400;line-height:1.3;margin:0;padding:0;text-decoration:none">
            <strong>{{($item->question)}}</strong>
          </a>
        </h2>
      </td>
    </tr>
  </tbody>
</table>

@if(!is_null($item->image) && $item->image !== '')
<table dir="ltr" style="padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="color:#0a0a0a;line-height:1.3;margin:0 auto;padding:0 0 0 16px;width:50px; text-align: center; vertical-align: middle;">
        <img src="{{ $item->image }}" style=" display:block; margin: 0 auto; height:auto;width:auto; max-width:100%; outline:0;">
      </td>
    </tr>
  </tbody>
</table>
@endif

<table dir="ltr" style="border-bottom:1px solid #f3f3f3;padding:0;text-align:left;vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="color:#0a0a0a;font-size:14px;padding:0 16px 0 16px;text-align:left;width:100%;font-weight:normal;">
        <p>{{($item->text)}}</p>
      </td>
    </tr>
  </tbody>
</table>

@if(!is_null($item->reply) && $item->reply !== '')
<table dir="ltr" style="vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="padding:0 8px 8px 16px; text-align:left; width:100%;">
        <h2 style="font-size:18px;font-weight:400;line-height:1.3;margin:0;padding:0;word-wrap:normal">
          <a href="#" style="text-decoration: none; font-weight: bold; color: #006699; font-weight:400;line-height:1.3;margin:0;padding:0;text-decoration:none">
            ↪ Replied by <strong>{{($item->officer)}}</strong>
          </a>
        </h2>
      </td>
    </tr>
  </tbody>
</table>

<table dir="ltr" style="border-bottom:1px solid #f3f3f3;padding:0;text-align:left;vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="color:#0a0a0a;font-size:14px;padding:0 16px 0 16px;text-align:left;width:100%;font-weight:normal;">
        <p>{{($item->reply)}}</p>
      </td>
    </tr>
  </tbody>
</table>
@else
<table dir="ltr" style="vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="padding:0 8px 8px 16px; text-align:center; width:100%;">
        <h2 style="font-size:18px;font-weight:400;line-height:1.3;margin:0;padding:0;word-wrap:normal">
          <a href="#" style="text-decoration: none; font-weight: bold; color: #006699; font-weight:400;line-height:1.3;margin:0;padding:0;text-decoration:none">
            <strong>😊 Thank you for your patience! Please hold on, your reply is on its way.</strong>
          </a>
        </h2>
      </td>
    </tr>
  </tbody>
</table>
@endif
<div style="background-color:#f3f3f3;">
  <table dir="ltr" style="padding:0;width:100%">
    <tbody><tr><td height="1px" style="border-collapse:collapse!important;line-height:20px;margin:0;mso-line-height-rule:exactly;padding:0;"> </td></tr></tbody>
  </table>
</div>
@empty
<table dir="ltr" style="vertical-align:top;width:100%">
  <tbody>
 <br><br>
    <tr>
      <td style="padding:0 8px 8px 16px; text-align:center; width:100%;">
        <h2 style="font-size:18px;font-weight:400;line-height:1.3;margin:0;padding:0;word-wrap:normal">
          <a href="#" style="text-decoration: none; font-weight: bold; color: #006699; font-weight:400;line-height:1.3;margin:0;padding:0;text-decoration:none">
          
          <strong>No History</strong>
          </a>
        </h2>
      </td>
    </tr>
  </tbody>
</table>
<div style="background-color:#f3f3f3;">
  <table dir="ltr" style="padding:0;width:100%">
    <tbody><tr><td height="1px" style="border-collapse:collapse!important;line-height:20px;margin:0;mso-line-height-rule:exactly;padding:0;"> </td></tr></tbody>
  </table>
</div>
@endforelse




<br><br><br><br><br>




</div>
<br><br><br><br><br>
<br><br>
</div>
<style>
  
.modal {
        position: relative;
        display: none; 
        position: fixed; 
        z-index: 100000; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4); 
        padding-top: 60px;
    }
    label, h2{
        color:#333;
    }
    #centered, form{
      
        width: 100%;
        text-align: center;
    }
  
    /* Modal Content */
    .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
    border-radius: 8px;
    max-height: 50vh;  /* Ensure modal doesn't take up too much space */
    overflow-y: auto;  /* Makes the content scrollable */
}


    /* The Close Button */
    .close {
    position: absolute; /* Position relative to modal-content */
    top: 10px;
    right: 10px;
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Form Styling */
    .form-group {
        margin: 15px;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-group button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #45a049;
    }
</style>
@include('layout.footer')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<!-- <script>
        var scrolling = false; // Start with auto-scroll off
        var scrolldelay;

        $(document).ready(function () {
            $('#autoScrollToggle').change(function() {
                if (this.checked) {
                    // Switch is ON
                    startAutoScroll();
                } else {
                    // Switch is OFF
                    stopAutoScroll();
                }
            });

            // Function to start auto-scroll
            function startAutoScroll() {
                scrolling = true;
                autoScroll();
            }

            // Function to stop auto-scroll
            function stopAutoScroll() {
                scrolling = false;
                clearTimeout(scrolldelay);
            }

            // Function to auto-scroll down the `.scroll` container
            function autoScroll() {
                if (!scrolling) return; // If auto-scroll is turned off, exit the function
                var $scrollContainer = $('.scroll'); // Select the scroll container
                $scrollContainer.scrollTop($scrollContainer.scrollTop() + 1); // Scroll the container down by 1px
                scrolldelay = setTimeout(autoScroll, 20); // Repeat the scroll every 20 milliseconds
            }

            // Detect when the user reaches the bottom of the `.scroll` container
            $('.scroll').scroll(function () {
                var $scrollContainer = $(this);
                if ($scrollContainer.scrollTop() + $scrollContainer.innerHeight() >= $scrollContainer[0].scrollHeight) {
                    topScroll($scrollContainer); // Scroll back to the top when the bottom is reached
                }
            });

            // Function to scroll back to the top of the `.scroll` container
            function topScroll($scrollContainer) {
                $scrollContainer.animate({scrollTop: 0}, 1000, function () {
                    if (scrolling) autoScroll(); // Restart auto-scroll after reaching the top if enabled
                });
            }
        });
    </script> -->

<script>


function showModalone() {
    document.getElementById("updateModalone").style.display = "block";
}

function closeModalone() {
    document.getElementById("updateModalone").style.display = "none";
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
    if (event.target == document.getElementById("updateModalone")) {
        closeModalone();
    }
}
</script>
<script>
        function displayImage(inputId, imageId) {
            var fileInput = document.getElementById(inputId);
            var imageDisplay = document.getElementById(imageId);

            imageDisplay.src = ''; // Clear the existing content in the image tag

            if (fileInput.files.length > 0) {
                var file = fileInput.files[0];

                if (file.type.match(/^image\//)) {
                    var reader = new FileReader();

                    reader.readAsDataURL(file);

                    reader.onload = function (e) {
                        imageDisplay.src = e.target.result; // Set the image source
                        imageDisplay.style.display = 'inline-block'; // Make the image visible
                    };
                } else {
                    imageDisplay.alt = 'Selected file is not an image.'; // Show error message
                    imageDisplay.style.display = 'none'; // Hide the image element
                }
            } else {
                imageDisplay.style.display = 'none'; // Hide if no file is selected
            }
        }
    </script>
</body>
</html>