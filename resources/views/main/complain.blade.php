<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userpage/complaints.css') }}">
</head>
<body>
@include('layout.header')

<div class="context-head">
    <h1> PROCEDURE FOR FILING OF COMPLAINTS</h1>
</div>
<div class="context-body">

    <div class="text_style">
    <p>CHR recognizes the importance of maintaining a 
        customer assistance and information system to 
        ensure that citizens’ concers, complaints, and 
        grievances againts CHR services and officials 
        and employees are immediately, efficiently, 
        and responsibly addressed or  referred to the 
        proper offices.</p>
    <p><strong>Office or Division:</strong> Citizens’ Help and Assistance Division (CHAD)</p>
    <p><strong>Classification:</strong> Simple transaction</p>
    <p><strong>Type of Transaction:</strong> G2C- Goverment to Citizens, and G2G - Government to Government</p>
    <p><strong>Who may avail:</strong> Individuals/Organizatons</p>
    <h2><strong style="text-decoration: underline;">Checklist of requirements</strong></h2>
    <p>
        <ol>
        <li>Letter/Accomplished Feedback Form (Secure a copy from CHAD/PACD Office)</li>
        <li>Complaint Letter/Accomplished Feedback From</li>
        <li>Assessed Feedback Form; Complaint Letter</li>
        </ol>
       
    </p>
    </div>
    <div class="image_center">
    <span class="padding_span"></span>
    <img src="logo/flowchart.png" alt="photo">
    </div>
</div>




<div class="complain-box">
<div class="alias" style="display: flex; align-items: center; justify-content: center;">
      <a href="{{ url('Complain-form') }}" id="buttonA" ><button class="btn2" value="Login">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        COMPLAIN</button>
      </a>
      </button>
      </div>

</div>
<span class="space">&nbsp;</span>
<br><br><br><br><br>
@include('layout.footer')
</body>
</html>