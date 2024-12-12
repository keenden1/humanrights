<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Receipt</title>
    <link rel="icon" type="image/png" href="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logo/logo.png'))) }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            font-size: 28px;
            margin: 20px 0;
            color: #007BFF; /* Bootstrap primary color */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007BFF; /* Bootstrap primary color */
            color: white;
        }
        .no-border {
            border: none;
        }
        .heading {
            font-size: 20px;
            font-weight: bold;
            color: #007BFF; /* Bootstrap primary color */
        }
        .text-center {
            text-align: center;
        }
        .summary, .assessment {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 800px;
            font-size: 16px;
            color: #555;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logo/logo.png'))) }}" alt="Description" height="100px" width="auto">
        <h1>CHRR1</h1>
    </div>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">Complaint Details</th>
            </tr>
            <tr>
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
                <th class="no-border text-start heading" colspan="5">Information Details</th>
            </tr>
            <tr>
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
                <th class="no-border text-start heading" colspan="5">Contact Details</th>
            </tr>
            <tr>
                <th >Email Address</th>
                <th>Contact</th>
                <th colspan="2">Address</th>
                <th>In-Charge</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $case->email ?? 'N/A'}}</td>
                <td>{{ $case->contact ?? 'N/A'}}</td>
                <td colspan="2">{{ $case->address ?? 'N/A'}}</td>
                <td>{{ $case->in_charge ?? 'N/A' }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p style="text-align:center; font-size: 28px; font-weight: bold; color: #007BFF; margin-top: 40px; text-transform: uppercase;">
    <strong>Summary Details</strong>
</p>
<div class="summary" style="padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); max-width: 800px; margin: 0 auto; font-size: 16px; color: #555;">
    {{ $case->report ?? 'N/A' }}
</div>

<br>

<p style="text-align:center; font-size: 28px; font-weight: bold; color: #007BFF; margin-top: 40px; text-transform: uppercase;">
    <strong>Assessment Details</strong>
</p>
<div class="assessment" style=" padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); max-width: 800px; margin: 0 auto; font-size: 16px; color: #555;">
    {{ $case->summary ?? 'N/A' }}
</div>
</body>
</html>