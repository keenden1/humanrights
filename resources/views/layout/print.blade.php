<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Reciept</title>
    <link rel="icon" type="image/png" href="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logo/logo.png'))) }}">
    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 19px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: justify;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>
       <div style="text-align: center;"> <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logo/logo.png'))) }}" alt="Description" height="100px" width="auto">
       <h1>CHRR1</h1>
       </div>
    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5" style="text-align: center; ">
                    Complaint Details
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Date</th>
                <th>Time</th>
                <th>Reference Number</th>
                <th>Case</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ \Carbon\Carbon::parse($case->created_at)->format('M. d, Y') ?? 'N/A'}}</td>
                <td>{{ \Carbon\Carbon::parse($case->created_at)->format('g:i A') ?? 'N/A'}}</td>
                <td>{{ $case->reference_number ?? 'N/A'}}</td>
                <td>{{ $case->case ?? 'N/A'}}</td>
                <td>{{ $case->status ?? 'N/A'}}</td>
            </tr>
        </tbody>
    </table>
<table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5" style="text-align: center; ">
                    Information Details
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Informant Name</th>
                <th>Relation</th>
                <th>Victim Name</th>
                <th>Gender</th>
                <th>Birthdate</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $case->guardian_name ?? 'N/A'}}</td>
                <td>{{ $case->relation ?? 'N/A'}}</td>
                <td>{{ $case->victim_name ?? 'N/A'}}</td>
                <td>{{ $case->gender ?? 'N/A'}}</td>
                <td>{{ \Carbon\Carbon::parse($case->birthdate)->format('M. d, Y') }}</td>
              
            </tr>
        </tbody>
    </table>
<table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5" style="text-align: center; ">
                    Contact Details
                </th>
            </tr>
            <tr class="bg-blue">
                <th >Email Address</th>
                <th>Contact</th>
                <th colspan="2">Address</th>
                <th >In-Charge</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $case->email ?? 'N/A'}}</td>
                <td>{{ $case->contact ?? 'N/A'}}</td>
                <td  colspan="2">{{ $case->address ?? 'N/A'}}</td>
                <td>{{ $case->in_charge ?? 'N/A' }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <p style="text-align:center; font-size: 24px; font-weight: bold; color: #333; margin-top: 20px;"> <strong>Summary Details</strong></p>
<p class="text-center" style="text-align:justify; font-size: 16px; color: #555; background-color: #f9f9f9; padding: 15px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 800px; margin: 0 auto;">
    {{ $case->report ?? 'N/A' }}
</p>

<br>
<p style="text-align:center; font-size: 24px; font-weight: bold; color: #333; margin-top: 20px;"> <strong>Assessment Details</strong></p>
<p class="text-center" style="text-align:justify; font-size: 16px; color: #555; background-color: #f9f9f9; padding: 15px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 800px; margin: 0 auto;">
    {{ $case->summary ?? 'N/A' }}
</p>


</body>
</html>