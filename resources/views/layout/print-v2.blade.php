
@php
    $timezone = 'Asia/Manila';
    $currentDateTime = now()->timezone($timezone);
    $formattedDate = $currentDateTime->format('F j, Y');
    $formattedTime = $currentDateTime->format('g:i A');
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 0.8;
      margin: 0;
      padding: 0;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header img {
      width: 64px;
      height: 64px;
    }

    .header__title {
      margin: 0;
      font-size: 12px;
      font-weight: bold;
    }

    .date {
      text-align: center;
      margin-bottom: 20px;
      font-size: 12px;
    }

    .section {
      margin-bottom: 20px;
    }

    .section h3 {
      margin-bottom: 10px;
      font-size: 11px;
      font-weight: bold;
    }

    .section p {
      margin: 5px 0;
      font-size: 10px;
    }

    .signature {
      text-align: right;
      margin-top: 40px;
      transform: translateX(10px);
      font-size: 11px;
    }

    .signature p {
      margin: 5px 0;
    }

    .red-text {
      color: red;
    }

    table thead tr th .header__date {
      font-weight: normal !important;
      font-size: 10px;
    }
  </style>
</head>

<body>
  {{-- <div class="header">
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logo/logo.png'))) }}" alt="Logo">
    <p>COMMISSION ON HUMAN RIGHTS REGION 1</p>
    <p>La Union Provincial Cooperative Union</p>
    <p class="header__date">December 12, 2024 &mdash; 02:10 PM</p>
  </div> --}}

  <table>
    <thead>
      <tr>
        <th width="150px" class="logo"><img
            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logo/logo.png'))) }}"
            alt="Logo" width="72px" height="72px"></th>
        <th style="text-align: center;">
          <p class="header__title">COMMISSION ON HUMAN RIGHTS REGION 1</p>
          <p class="header__title">La Union Provincial Cooperative Union</p>
          <p style="font-weight: normal !important; font-size: 10px;" class="header__date">{{ $formattedDate }} &mdash; {{ $formattedTime }}</p>
        </th>
      </tr>
    </thead>
  </table>

  <div class="section">
    <h3>Complaint Details:</h3>
    <p>Reference Number: {{ $case->reference_number ?? 'N/A' }}</p>
    <p>Case: {{ $case->case ?? 'N/A' }}</p>
    <p>Status: {{ $case->status ?? 'N/A' }}</p>
    <p>In-Charge: {{ $case->in_charge ?? 'N/A' }}</p>
    <p>Informant Name: {{ $case->guardian_name ?? 'N/A' }}</p>
    <p>Relation: {{ $case->relation ?? 'N/A' }}</p>
    <p>Victim Name: {{ $case->victim_name ?? 'N/A' }}</p>
    <p>Gender: {{ $case->gender ?? 'N/A' }}</p>
    <p>Birthdate: {{ \Carbon\Carbon::parse($case->birthdate)->format('M. d, Y') }}</p>
    <p>Age: {{ \Carbon\Carbon::parse($case->birthdate)->age }}</p>
    <p>Email Address: {{ $case->email ?? 'N/A' }}</p>
    <p>Contact: {{ $case->contact ?? 'N/A' }}</p>
    <p>Address: 123 Sample Street, Sample City</p>
  </div>

  <div class="section">
    <h3>Summary Details:</h3>
    <p>{{ $case->report ?? 'N/A' }}</p>
  </div>

  <div class="section">
    <h3>Assessment Details:</h3>
    <p>{{ $case->summary ?? 'N/A' }}</p>
  </div>

  <div class="signature">
    <p>___________________________</p>
    <p>Signature over Printed Name &nbsp; &nbsp;</p>
  </div>
</body>

</html>
