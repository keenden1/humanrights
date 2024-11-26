<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userpage/forum.css') }}">
</head>
<body>
@include('layout.header')

<div class="container">
  <p class="style">Scroll</p>
<div class="toggle-button-cover">
  <div class="form"><p>Latest </p> <p>|</p> <p> Titles </p> <p>|</p> <p> Post </p> </div>
      <div class="button-cover">
        <div class="button r" id="button-3">
          <input type="checkbox" class="checkbox" id="autoScrollToggle"/>
          <div class="knobs"></div>
          <div class="layer"></div>
        </div> 
      </div>
  </div>
<div class="scroll" onLoad="autoScroll()">

<table dir="ltr" style="width:100%">
  <tbody>
    <tr>
      <td style="margin:0;padding:0 0 0 16px;text-align:left;vertical-align:top;">
        <p style="color:#8f8f8f;line-height:1.3;margin: 20px 0 0 0;">
          <a href="https://forum.sublimetext.com/c/technical-support" style="text-decoration: none; font-weight: bold; color: #006699;; font-size: 0.857em; white-space: nowrap; display: inline-block; position: relative; line-height: 1; margin-right: 10px;"><span style="background-color: #d47e65;display: inline-block; width: 10px; height: 10px;"></span><span style="color: #222222; vertical-align: text-top; line-height: 1; margin-left: 4px; padding-left: 2px; display: inline;max-width: 150px; overflow: hidden; text-overflow: ellipsis;" data-drop-close="true">Bullying</span></a>
        </p>
      </td>
      <td style="margin:0;padding:0 16px 0 0;text-align:right;vertical-align:top;">
        <p style="color:#8f8f8f;line-height:1.3;margin:20px 0 0 0;font-weight:400;">
          December 28, 2023
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
          <a href="#" style="text-decoration: none; font-weight: bold; color: #006699;; font-weight:400;line-height:1.3;margin:0;padding:0;text-decoration:none">
            <strong>Discovering commands and their parameters</strong>
          </a>
        </h2>
      </td>
    </tr>
  </tbody>
</table>

<table dir="ltr" style="padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="color:#0a0a0a;line-height:1.3;margin:0 auto;padding:0 0 0 16px;width:50px;">
        <img src="logo/logo.png" style="border-radius:50%;clear:both;display:block;float:none;height:50px;width:50px;margin:0;max-width:100%;outline:0;text-align:center;text-decoration:none;" >
      </td>
      <td style="color:#0a0a0a;padding:0 16px 0 8px;text-align:left;vertical-align:top;">
            <h6 style="color:inherit;line-height:1.3;margin:0;padding:0;font-weight: normal;font-size:16px;">Marcus</h6>
          <p style="color:inherit;font-size:14px;font-weight:400;line-height:1.3;margin:0 0 8px 0;padding:0;word-wrap:normal;">marcuso</p>
      </td>
    </tr>
  </tbody>
</table>

<table dir="ltr" style="border-bottom:1px solid #f3f3f3;padding:0;text-align:left;vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="color:#0a0a0a;font-size:14px;padding:0 16px 0 16px;text-align:left;width:100%;font-weight:normal;">
        <p>Is there some way to see a list of the built-in commands and what parameters they take?</p>
<p>Many times, I’m wanting a keybinding to do something and, unless it’s in the default keymap, I have no idea what the command is.</p>
      </td>
    </tr>
  </tbody>
</table>


<table dir="ltr" style="padding:0;text-align:left;vertical-align:top;width:100%; margin-top:20px;">
  <tbody>
    <tr>
      <td style="padding:0 8px 16px 16px;text-align:left;white-space:nowrap;vertical-align:top;width:75px">
        <img src="https://forum.sublimetext.com/images/emails/heart.png" style="clear:both;display:inline-block;float:left;height:20px;margin:0;max-width:100%;opacity:.4;outline:0;text-decoration:none;width:auto">
        <p style="color:#8f8f8f;float:left;line-height:1.3;margin:0 5px 10px 5px;padding:0;text-align:left;font-weight:400;">3</p>
      </td>
      <td style="padding:0 8px 16px 8px;text-align:left;white-space:nowrap;vertical-align:top;width:75px">
        <img src="https://forum.sublimetext.com/images/emails/comment.png" style="clear:none;display:inline-block;float:left;height:20px;margin:0;max-width:100%;opacity:.4;outline:0;text-decoration:none;width:auto">
        <p style="color:#8f8f8f;float:left;line-height:1.3;margin:0 5px 10px 5px;padding:0;text-align:left;font-weight:400;">2</p>
      </td>
      <td style="padding:0 8px 16px 8px;text-align:left;white-space:nowrap;vertical-align:top;">

      <img src="logo/logo.png" style="border-radius:50%;clear:both;display:inline-block;height:20px;width:20px;outline:0;text-decoration:none;">
    
    
    </td>
      <td style="line-height:1.3;padding:0 16px 0 8px;text-align:right;white-space:nowrap;vertical-align:top;">
        <a href="#" style="text-decoration: none; font-weight: bold; color: #006699;; background-color: #2F70AC; color: #FFFFFF;; width:100%;text-decoration:none;padding:8px 16px;white-space:nowrap;">
          Read More
        </a>
      </td>
    </tr>
  </tbody>
</table>
<div style="background-color:#f3f3f3;">
  <table dir="ltr" style="padding:0;width:100%">
    <tbody><tr><td height="1px" style="border-collapse:collapse!important;line-height:20px;margin:0;mso-line-height-rule:exactly;padding:0;"> </td></tr></tbody>
  </table>
</div>
<br><br>








<table dir="ltr" style="width:100%">
  <tbody>
    <tr>
      <td style="margin:0;padding:0 0 0 16px;text-align:left;vertical-align:top;">
        <p style="color:#8f8f8f;line-height:1.3;margin: 20px 0 0 0;">
          <a href="https://forum.sublimetext.com/c/technical-support" style="text-decoration: none; font-weight: bold; color: #006699;; font-size: 0.857em; white-space: nowrap; display: inline-block; position: relative; line-height: 1; margin-right: 10px;"><span style="background-color: #d47e65;display: inline-block; width: 10px; height: 10px;"></span><span style="color: #222222; vertical-align: text-top; line-height: 1; margin-left: 4px; padding-left: 2px; display: inline;max-width: 150px; overflow: hidden; text-overflow: ellipsis;" data-drop-close="true">Technical Support</span></a>
        </p>
      </td>
      <td style="margin:0;padding:0 16px 0 0;text-align:right;vertical-align:top;">
        <p style="color:#8f8f8f;line-height:1.3;margin:20px 0 0 0;font-weight:400;">
          December 28, 2023
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
          <a href="#" style="text-decoration: none; font-weight: bold; color: #006699;; font-weight:400;line-height:1.3;margin:0;padding:0;text-decoration:none">
            <strong>Discovering commands and their parameters</strong>
          </a>
        </h2>
      </td>
    </tr>
  </tbody>
</table>

<table dir="ltr" style="padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="color:#0a0a0a;line-height:1.3;margin:0 auto;padding:0 0 0 16px;width:50px;">
        <img src="logo/logo.png" style="border-radius:50%;clear:both;display:block;float:none;height:50px;width:50px;margin:0;max-width:100%;outline:0;text-align:center;text-decoration:none;" >
      </td>
      <td style="color:#0a0a0a;padding:0 16px 0 8px;text-align:left;vertical-align:top;">
            <h6 style="color:inherit;line-height:1.3;margin:0;padding:0;font-weight: normal;font-size:16px;">Marcus</h6>
          <p style="color:inherit;font-size:14px;font-weight:400;line-height:1.3;margin:0 0 8px 0;padding:0;word-wrap:normal;">marcuso</p>
      </td>
    </tr>
  </tbody>
</table>

<table dir="ltr" style="border-bottom:1px solid #f3f3f3;padding:0;text-align:left;vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="color:#0a0a0a;font-size:14px;padding:0 16px 0 16px;text-align:left;width:100%;font-weight:normal;">
        <p>Is there some way to see a list of the built-in commands and what parameters they take?</p>
<p>Many times, I’m wanting a keybinding to do something and, unless it’s in the default keymap, I have no idea what the command is.</p>
      </td>
    </tr>
  </tbody>
</table>


<table dir="ltr" style="padding:0;text-align:left;vertical-align:top;width:100%; margin-top:20px;">
  <tbody>
    <tr>
      <td style="padding:0 8px 16px 16px;text-align:left;white-space:nowrap;vertical-align:top;width:75px">
        <img src="https://forum.sublimetext.com/images/emails/heart.png" style="clear:both;display:inline-block;float:left;height:20px;margin:0;max-width:100%;opacity:.4;outline:0;text-decoration:none;width:auto">
        <p style="color:#8f8f8f;float:left;line-height:1.3;margin:0 5px 10px 5px;padding:0;text-align:left;font-weight:400;">3</p>
      </td>
      <td style="padding:0 8px 16px 8px;text-align:left;white-space:nowrap;vertical-align:top;width:75px">
        <img src="https://forum.sublimetext.com/images/emails/comment.png" style="clear:none;display:inline-block;float:left;height:20px;margin:0;max-width:100%;opacity:.4;outline:0;text-decoration:none;width:auto">
        <p style="color:#8f8f8f;float:left;line-height:1.3;margin:0 5px 10px 5px;padding:0;text-align:left;font-weight:400;">2</p>
      </td>
      <td style="padding:0 8px 16px 8px;text-align:left;white-space:nowrap;vertical-align:top;">
          imagehere  </td>
      <td style="line-height:1.3;padding:0 16px 0 8px;text-align:right;white-space:nowrap;vertical-align:top;">
        <a href="#" style="text-decoration: none; font-weight: bold; color: #006699;; background-color: #2F70AC; color: #FFFFFF;; width:100%;text-decoration:none;padding:8px 16px;white-space:nowrap;">
          Read More
        </a>
      </td>
    </tr>
  </tbody>
</table>
<div style="background-color:#f3f3f3;">
  <table dir="ltr" style="padding:0;width:100%">
    <tbody><tr><td height="1px" style="border-collapse:collapse!important;line-height:20px;margin:0;mso-line-height-rule:exactly;padding:0;"> </td></tr></tbody>
  </table>
</div>
<br><br>





<table dir="ltr" style="width:100%">
  <tbody>
    <tr>
      <td style="margin:0;padding:0 0 0 16px;text-align:left;vertical-align:top;">
        <p style="color:#8f8f8f;line-height:1.3;margin: 20px 0 0 0;">
          <a href="https://forum.sublimetext.com/c/technical-support" style="text-decoration: none; font-weight: bold; color: #006699;; font-size: 0.857em; white-space: nowrap; display: inline-block; position: relative; line-height: 1; margin-right: 10px;"><span style="background-color: #d47e65;display: inline-block; width: 10px; height: 10px;"></span><span style="color: #222222; vertical-align: text-top; line-height: 1; margin-left: 4px; padding-left: 2px; display: inline;max-width: 150px; overflow: hidden; text-overflow: ellipsis;" data-drop-close="true">Technical Support</span></a>
        </p>
      </td>
      <td style="margin:0;padding:0 16px 0 0;text-align:right;vertical-align:top;">
        <p style="color:#8f8f8f;line-height:1.3;margin:20px 0 0 0;font-weight:400;">
          December 28, 2023
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
          <a href="#" style="text-decoration: none; font-weight: bold; color: #006699;; font-weight:400;line-height:1.3;margin:0;padding:0;text-decoration:none">
            <strong>Discovering commands and their parameters</strong>
          </a>
        </h2>
      </td>
    </tr>
  </tbody>
</table>

<table dir="ltr" style="padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="color:#0a0a0a;line-height:1.3;margin:0 auto;padding:0 0 0 16px;width:50px;">
        <img src="logo/logo.png" style="border-radius:50%;clear:both;display:block;float:none;height:50px;width:50px;margin:0;max-width:100%;outline:0;text-align:center;text-decoration:none;" >
      </td>
      <td style="color:#0a0a0a;padding:0 16px 0 8px;text-align:left;vertical-align:top;">
            <h6 style="color:inherit;line-height:1.3;margin:0;padding:0;font-weight: normal;font-size:16px;">Marcus</h6>
          <p style="color:inherit;font-size:14px;font-weight:400;line-height:1.3;margin:0 0 8px 0;padding:0;word-wrap:normal;">marcuso</p>
      </td>
    </tr>
  </tbody>
</table>

<table dir="ltr" style="border-bottom:1px solid #f3f3f3;padding:0;text-align:left;vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="color:#0a0a0a;font-size:14px;padding:0 16px 0 16px;text-align:left;width:100%;font-weight:normal;">
        <p>Is there some way to see a list of the built-in commands and what parameters they take?</p>
<p>Many times, I’m wanting a keybinding to do something and, unless it’s in the default keymap, I have no idea what the command is.</p>
      </td>
    </tr>
  </tbody>
</table>


<table dir="ltr" style="padding:0;text-align:left;vertical-align:top;width:100%; margin-top:20px;">
  <tbody>
    <tr>
      <td style="padding:0 8px 16px 16px;text-align:left;white-space:nowrap;vertical-align:top;width:75px">
        <img src="https://forum.sublimetext.com/images/emails/heart.png" style="clear:both;display:inline-block;float:left;height:20px;margin:0;max-width:100%;opacity:.4;outline:0;text-decoration:none;width:auto">
        <p style="color:#8f8f8f;float:left;line-height:1.3;margin:0 5px 10px 5px;padding:0;text-align:left;font-weight:400;">3</p>
      </td>
      <td style="padding:0 8px 16px 8px;text-align:left;white-space:nowrap;vertical-align:top;width:75px">
        <img src="https://forum.sublimetext.com/images/emails/comment.png" style="clear:none;display:inline-block;float:left;height:20px;margin:0;max-width:100%;opacity:.4;outline:0;text-decoration:none;width:auto">
        <p style="color:#8f8f8f;float:left;line-height:1.3;margin:0 5px 10px 5px;padding:0;text-align:left;font-weight:400;">2</p>
      </td>
      <td style="padding:0 8px 16px 8px;text-align:left;white-space:nowrap;vertical-align:top;">
          imagehere  </td>
      <td style="line-height:1.3;padding:0 16px 0 8px;text-align:right;white-space:nowrap;vertical-align:top;">
        <a href="#" style="text-decoration: none; font-weight: bold; color: #006699;; background-color: #2F70AC; color: #FFFFFF;; width:100%;text-decoration:none;padding:8px 16px;white-space:nowrap;">
          Read More
        </a>
      </td>
    </tr>
  </tbody>
</table>
<div style="background-color:#f3f3f3;">
  <table dir="ltr" style="padding:0;width:100%">
    <tbody><tr><td height="1px" style="border-collapse:collapse!important;line-height:20px;margin:0;mso-line-height-rule:exactly;padding:0;"> </td></tr></tbody>
  </table>
</div>
<br><br>





<table dir="ltr" style="width:100%">
  <tbody>
    <tr>
      <td style="margin:0;padding:0 0 0 16px;text-align:left;vertical-align:top;">
        <p style="color:#8f8f8f;line-height:1.3;margin: 20px 0 0 0;">
          <a href="https://forum.sublimetext.com/c/technical-support" style="text-decoration: none; font-weight: bold; color: #006699;; font-size: 0.857em; white-space: nowrap; display: inline-block; position: relative; line-height: 1; margin-right: 10px;"><span style="background-color: #d47e65;display: inline-block; width: 10px; height: 10px;"></span><span style="color: #222222; vertical-align: text-top; line-height: 1; margin-left: 4px; padding-left: 2px; display: inline;max-width: 150px; overflow: hidden; text-overflow: ellipsis;" data-drop-close="true">Technical Support</span></a>
        </p>
      </td>
      <td style="margin:0;padding:0 16px 0 0;text-align:right;vertical-align:top;">
        <p style="color:#8f8f8f;line-height:1.3;margin:20px 0 0 0;font-weight:400;">
          December 28, 2023
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
          <a href="#" style="text-decoration: none; font-weight: bold; color: #006699;; font-weight:400;line-height:1.3;margin:0;padding:0;text-decoration:none">
            <strong>Discovering commands and their parameters</strong>
          </a>
        </h2>
      </td>
    </tr>
  </tbody>
</table>

<table dir="ltr" style="padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="color:#0a0a0a;line-height:1.3;margin:0 auto;padding:0 0 0 16px;width:50px;">
        <img src="logo/logo.png" style="border-radius:50%;clear:both;display:block;float:none;height:50px;width:50px;margin:0;max-width:100%;outline:0;text-align:center;text-decoration:none;" >
      </td>
      <td style="color:#0a0a0a;padding:0 16px 0 8px;text-align:left;vertical-align:top;">
            <h6 style="color:inherit;line-height:1.3;margin:0;padding:0;font-weight: normal;font-size:16px;">Marcus</h6>
          <p style="color:inherit;font-size:14px;font-weight:400;line-height:1.3;margin:0 0 8px 0;padding:0;word-wrap:normal;">marcuso</p>
      </td>
    </tr>
  </tbody>
</table>

<table dir="ltr" style="border-bottom:1px solid #f3f3f3;padding:0;text-align:left;vertical-align:top;width:100%">
  <tbody>
    <tr>
      <td style="color:#0a0a0a;font-size:14px;padding:0 16px 0 16px;text-align:left;width:100%;font-weight:normal;">
        <p>Is there some way to see a list of the built-in commands and what parameters they take?</p>
<p>Many times, I’m wanting a keybinding to do something and, unless it’s in the default keymap, I have no idea what the command is.</p>
      </td>
    </tr>
  </tbody>
</table>


<table dir="ltr" style="padding:0;text-align:left;vertical-align:top;width:100%; margin-top:20px;">
  <tbody>
    <tr>
      <td style="padding:0 8px 16px 16px;text-align:left;white-space:nowrap;vertical-align:top;width:75px">
        <img src="https://forum.sublimetext.com/images/emails/heart.png" style="clear:both;display:inline-block;float:left;height:20px;margin:0;max-width:100%;opacity:.4;outline:0;text-decoration:none;width:auto">
        <p style="color:#8f8f8f;float:left;line-height:1.3;margin:0 5px 10px 5px;padding:0;text-align:left;font-weight:400;">3</p>
      </td>
      <td style="padding:0 8px 16px 8px;text-align:left;white-space:nowrap;vertical-align:top;width:75px">
        <img src="https://forum.sublimetext.com/images/emails/comment.png" style="clear:none;display:inline-block;float:left;height:20px;margin:0;max-width:100%;opacity:.4;outline:0;text-decoration:none;width:auto">
        <p style="color:#8f8f8f;float:left;line-height:1.3;margin:0 5px 10px 5px;padding:0;text-align:left;font-weight:400;">2</p>
      </td>
      <td style="padding:0 8px 16px 8px;text-align:left;white-space:nowrap;vertical-align:top;">
          imagehere  </td>
      <td style="line-height:1.3;padding:0 16px 0 8px;text-align:right;white-space:nowrap;vertical-align:top;">
        <a href="#" style="text-decoration: none; font-weight: bold; color: #006699;; background-color: #2F70AC; color: #FFFFFF;; width:100%;text-decoration:none;padding:8px 16px;white-space:nowrap;">
          Read More
        </a>
      </td>
    </tr>
  </tbody>
</table>
<div style="background-color:#f3f3f3;">
  <table dir="ltr" style="padding:0;width:100%">
    <tbody><tr><td height="1px" style="border-collapse:collapse!important;line-height:20px;margin:0;mso-line-height-rule:exactly;padding:0;"> </td></tr></tbody>
  </table>
</div>
<br><br>

</div>
</div>
@include('layout.footer')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script>
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
    </script>

</body>
</html>