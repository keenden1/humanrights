@extends('layout.adminheader')

@section('title', 'Admin-Report')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/report.css') }}">
<script src="{{ asset('js/admin/officer.js') }}"></script> 

<div class="float-float">
    <p>REPORTS</p>
</div>
<div class="main">

    <div class="left">
        <div style="width:300px; margin:auto; border: 1px solid #ccc; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);" class="dates">
            <table width="300px">
                <tr>
                    <th colspan="2" style="text-align:center; background-color:#fff;">
                        <span id="today"></span>
                    </th>
                </tr>
                <form id="reportForm" method="POST" action="{{ route('generateReport') }}">
                @csrf
                <tr>
                    <td style="text-align:right;">Set Data</td>
                    <td style="text-align:left;">
                        <select id="setdata" name="setdata">
                            <option value="none" selected>Select Date</option>
                            <option value="gender">Gender</option>
                            <option value="age">Age</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right;">Set Period</td>
                    <td style="text-align:left;">
                        <select id="setdate" name="setdate">
                            <option value="none" selected>Select Date</option>
                            <option value="monthly">Monthly</option>
                            <option value="weekly">Weekly</option>
                            <option value="daily">Daily</option>
                        </select>
                    </td>
                </tr>
                <tr style="display: none;">
                    <td style="text-align:right;">Preset Month</td>
                    <td style="text-align:left;">
                        <select id="monthSelect" name="monthSelect">
                            <option value="none" selected>Select Month</option>
                            @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr style="display: none;">
                    <td style="text-align:right;">Preset Week</td>
                    <td style="text-align:left;">
                        <select id="weekSelect" name="weekSelect">
                            <option value="none" selected>Select Week</option>
                            <option value="week1">Week 1</option>
                            <option value="week2">Week 2</option>
                            <option value="week3">Week 3</option>
                            <option value="week4">Week 4</option>
                        </select>
                    </td>
                </tr>
                <tr style="display: none;">
                    <td style="text-align:right;">Preset Year</td>
                    <td style="text-align:left;">
                        <select id="yearSelect" name="yearSelect">
                            <option value="none" selected>Select Year</option>
                            @for ($year = 2019; $year <= 2030; $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </td>
                </tr>
                <tr style="display: none;">
                    <td style="text-align:right;">Start Date:</td>
                    <td style="text-align:left;">
                        <input type="date" name="date1" id="datePicker1" />
                    </td>
                </tr>
                <tr style="display: none;">
                    <td style="text-align:right;">End Date:</td>
                    <td style="text-align:left;">
                        <input type="date" name="date2" id="datePicker2" />
                    </td>
                </tr>
                </table>
                <div style="width:100%; align-items: center; text-align:center;">
                    <button type="submit" class="btn" style="margin-top: 10px; margin-bottom: 10px; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Generate Report</button>
                    <div id="printButtonDiv" style="display: none; margin-bottom: 10px; text-align: center;">
                        <button id="printButton" onclick="printPDF()" class="btn" style="background-color: #28a745; color: white; padding: 10px 15px; border-radius: 4px;">Print Report</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="right">
            <div class="lines" style="text-align:center;">
                <h2 style="color:#333;">Graph</h2>
                <canvas id="myLineChart"></canvas>
            </div>
            <div id="selectedDates" style="margin-top: 20px; text-align: center;">
        <p id="reportPeriod"></p>
        <p id="reportDateRange"></p>
    </div>
        </div>
    </div>
    <style>
        table {
            width: 100%;
        }

        th {
            text-align: center;
            padding-bottom: 5px;
        }

        .dates {
            margin-right: 15px !important;
            margin-top: 25px !important;
        }

        th span {
            font-size: 24px;
            color: #333;
            font-weight: bold;
        }

        #today {
            font-size: 14px;
        }

        td {
            padding: 3px 4px;
        }

        td:first-child {
            text-align: right;
            color: #555;
        }

        select, input[type="date"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        select:focus, input[type="date"]:focus {
            border-color: #007bff;
            outline: none;
        }

        @media (max-width: 972px) {
            .main {
                display: grid !important;
                margin: 0 !important;
            }
            .lines {
                width: 100%;
                max-width: 300px; 
            }
        }

        @media print {
            body * {
                visibility: hidden; /* Hide everything */
            }
            body {
                margin: 0;
                padding: 0;
                overflow: visible; /* Ensure everything is visible */
            }
            .right, .right * {
                visibility: visible; /* Show only the print content */
            }
            .right {
                position: absolute; /* Positioning to avoid layout issues */
                left: 0;
                top: 0;
            }
        }
    </style>
    <script>
        function updateDate() {
            const now = new Date();
            const options = { 
                weekday: 'short', 
                year: 'numeric', 
                month: 'short', 
                day: 'numeric', 
                hour: '2-digit', 
                minute: '2-digit', 
                second: '2-digit', 
                hour12: false 
            };
            const formattedDate = now.toLocaleString('en-US', options);
            const timezone = "<br>(Philippine Standard Time)";
            document.getElementById("today").innerHTML = formattedDate + timezone;
        }

        updateDate();
        setInterval(updateDate, 1000);

        const ctx = document.getElementById('myLineChart').getContext('2d');
        const myLineChart = new Chart(ctx, {
            type: 'bar', // Use bar for better visualization of categories
            data: {
                labels: [],
                datasets: [{
                    label: 'Count',
                    data: [],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        document.getElementById('reportForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent form submission

            const formData = new FormData(this);
            fetch('{{ route('generateReport') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then((response) => response.json())
            .then((data) => {
                const labels = Object.keys(data);  // ['Male', 'Female']
                const values = Object.values (data); // [10, 15]

                // Update chart data
                myLineChart.data.labels = labels;
                myLineChart.data.datasets[0].data = values;
                myLineChart.update();

                if (Object.keys(data).length > 0) {
                    document.getElementById('printButtonDiv').style.display = 'block';
                }
            });
        });

        function printPDF() {
    // Get selected values from the form
    const setDateValue = document.getElementById('setdate').value;
    const startDate = document.getElementById('datePicker1').value;
    const endDate = document.getElementById('datePicker2').value;

    // Prepare the report period text
    let reportPeriodText = '';
    if (setDateValue === 'daily') {
        reportPeriodText = `Period: Daily`;
        document.getElementById('reportDateRange').innerText = `From: ${startDate} To: ${endDate}`;
    } else if (setDateValue === 'weekly') {
        reportPeriodText = `Period: Weekly`;
        // Add logic to display selected week/month/year if needed
    } else if (setDateValue === 'monthly') {
        reportPeriodText = `Period: Monthly`;
        // Add logic to display selected month/year if needed
    }

    // Update the report period text in the selectedDates section
    document.getElementById('reportPeriod').innerText = reportPeriodText;

    // Now generate the PDF
    const element = document.querySelector('.right'); // Adjust this selector based on your layout
    const opt = {
        margin:       0.2,
        filename:     'report.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    };

    // Use html2pdf to convert the element to PDF
    html2pdf().from(element).set(opt).save();
}

        document.getElementById('setdate').addEventListener('change', function () {
            const selectedValue = this.value;

            // Select relevant elements
            const monthSelect = document.getElementById('monthSelect').parentNode.parentNode;
            const weekSelect = document.getElementById('weekSelect').parentNode.parentNode;
            const yearSelect = document.getElementById('yearSelect').parentNode.parentNode;
            const startDateRow = document.querySelector('input[name="date1"]').parentNode.parentNode;
            const endDateRow = document.querySelector('input[name="date2"]').parentNode.parentNode;

            // Reset all rows to hidden
            monthSelect.style.display = 'none';
            weekSelect.style.display = 'none';
            yearSelect.style.display = 'none';
            startDateRow.style.display = 'none';
            endDateRow.style.display = 'none';

            // Display fields based on selected value
            if (selectedValue === 'monthly') {
                monthSelect.style.display = 'table-row';
                yearSelect.style.display = 'table-row';
            } else if (selectedValue === 'weekly') {
                weekSelect.style.display = 'table-row';
                monthSelect.style.display = 'table-row';
                yearSelect.style.display = 'table-row';
            } else if (selectedValue === 'daily') {
                startDateRow.style.display = 'table-row';
                endDateRow.style.display = 'table-row';
            }
        });
    </script>
@endsection