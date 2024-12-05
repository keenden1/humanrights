@extends('layout.adminheader')

@section('title', 'Dashboard')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/officer/officerdashboard.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/officer/report.css') }}">
<div class="float-float">

    <p>DASHBOARD</p>
</div>
<div class="experiment">
    <br>
          <div class="table-container">
               <a href=""  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Legal Age Report</h2>
                            <h3> Male: {{$maleLegalCount}}</h3>
                            <h3> Female: {{$femaleLegalCount}} </h3>
                        </span> 
                    </div>
                    </a>
                    <a href=""  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Minor Age Report</h2>
                            <h3> Male: {{$maleMinorCount}}</h3>
                            <h3> Female: {{$femaleMinorCount}} </h3>
                        </span> 
                    </div>
                    </a>
                    <a href="" class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Users</h2>
                            <p>{{$totalUsers}}</p>
                        </span>
                        <span>
                            <i class="fa fa-edit"></i> 
                        </span>
                    </div>
                    </a>
                    <a href=""  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Feedback</h2>
                            <p>{{$totalFeedBack}}</p>
                        </span>
                        <span>
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </span>
                    </div>
                    </a>
                    <a href=""  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Cases</h2>
                            <p>{{ $totalCases }}</p>
                        </span>
                        <span>
                            <i class="fa-solid fa-list-check"></i>
                        </span>
                    </div>
                    </a>
  
        </div>

    <div class="container_2">
      <div class="container-left">
        <div class="title title-left">Feedback Rating</div>
        <div class="circle">
          <div class="circle-score">{{ number_format($averageRating, 1) }}</div>
          <div class="circle-out-of">total of {{ $sumRating }} rating</div>
        </div>
        <div class="container-left-bottom">
          <div class="container-left-bottom-compliment">
          <p>Rating Percentage: {{ number_format($percentage, 2) }}%</p>
          </div>
          <div class="container-left-bottom-description">
            <p>
            Your feedback is invaluable! Together, we can overcome challenges and continuously improve our performance!
            </p>
          </div>
        </div>
      </div>

      <div class="container-right-box"></div>
      <!-- <div class="container-right">
        <div class="title title-right">Summary  &nbsp; &nbsp; &nbsp; &nbsp; Total : 300</div>
        <div class="stat-box">
          <div class="stat stat-reaction">
            <div class="stat-part-left red">
             Fair &nbsp; &nbsp; &nbsp;
            </div>
            <div class="stat-part-right">
              <span class="blue">80</span> / 100
            </div>
          </div>
          <div class="stat stat-memory">
            <div class="stat-part-left yellow">
            Average
            </div>
            <div class="stat-part-right">
              <span class="blue">92</span> / 100
            </div>
          </div>
          <div class="stat stat-verbal">
            <div class="stat-part-left green">
              Good  &nbsp; &nbsp;
            </div>
            <div class="stat-part-right">
              <span class="blue">61</span> / 100
            </div>
          </div>
          <div class="stat stat-visual">
            <div class="stat-part-left purple">
             Excellent
            </div>
            <div class="stat-part-right">
              <span class="blue">72</span> / 100
            </div>
            
          </div>

          <div class="stat stat-visual">
            <div class="stat-part-left green">
             Outstanding
            </div>
            <div class="stat-part-right">
              <span class="blue">72</span> / 100
            </div>
            
          </div>

        </div>
        <button class="btn">Feedback</button>
      </div> -->


     <!-- <div>
        <button>update</button>
     <div style="width:300px; margin:auto;" class="dates">
     -->


    </div>


     <!-- <div class="pie">
                    <h2>Top Ratings</h2>
                    <canvas id="pieChart"></canvas>
        </div> -->
     </div>
      
    </div>
</div>

<table width="300px" style="display:none;">
        <tr>
            <th colspan="2" style="text-align:center; background-color:#fff;">
            <span id="today"></span>
            </th>
        </tr>
        <tr>
            <td style="text-align:right;">Preset Range</td>
            <td style="text-align:left;">
                <select name='date0' id="presetDate">
                    <option value="none" selected>Custom Date</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="previousWeek">Previous Week</option>
                    <option value="previousMonth">Previous Month</option>
                    <option value="previousYear">Previous Year</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="text-align:right;">Start Date:</td>
            <td style="text-align:left;">
                <input type="date" name="date1" id="datePicker1" />
            </td>
        </tr>
        <tr>
            <td style="text-align:right;">End Date:</td>
            <td style="text-align:left;">
                <input type="date" name="date2" id="datePicker2" />
            </td>
        </tr>
    </table>



  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .bottom {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .graph-container {
            flex: 1; /* Allow both graphs to take equal space */
            margin: 0 10px; /* Add some margin between the graphs */
        }
        canvas {
            width: 100% !important; /* Make canvas take full width */
            height: auto !important; /* Maintain aspect ratio */
        }
        @media (max-width: 759px) {
            .bottom {
                display: block; /* Change to block layout */
            }
            .graph-container {
                margin: 10px 0; /* Add margin for vertical spacing */
            }
            }


            table {
      width: 100%;
    }

    th {
      text-align: center;
      padding-bottom: 5px;
     
    }
.dates{
  margin-right: 15px !important;
  margin-top: 5px !important;
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
</style>
<script>
        // Wait for the DOM to fully load
        document.addEventListener('DOMContentLoaded', function () {
            // First graph
            var ctx1 = document.getElementById('graph1').getContext('2d');
            var myChart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Sales 2023',
                        data: [12, 19, 3, 5, 2, 3, 7],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Second graph
            var ctx2 = document.getElementById('graph2').getContext('2d');
            var myChart2 = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Revenue 2023',
                        data: [10, 15, 7, 12, 8, 5, 9],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

    
<script>
var ctxPie = document.getElementById('pieChart').getContext('2d');
var pieChart = new Chart(ctxPie, {
    type: 'pie',
    data: {
        labels: ['Fair',  'Average', 'Good', 'Excelent', 'Outstanding'],
        datasets: [{
            data: [ 100, 150, 200, 250, 300], 
            backgroundColor: ['#4CAF50', '#FF9800', '#2196F3', '#F44336', '#9C27B0'] 
        }]
    }
});
function updateDate() {
  // Get the current date
  const now = new Date();

  // Define options for formatting the date
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

  // Format the date
  const formattedDate = now.toLocaleString('en-US', options);
  
  // Add the timezone with a line break
  const timezone = "<br>(Philippine Standard Time)";

  // Update the HTML content with the formatted date and timezone
  document.getElementById("today").innerHTML = formattedDate + timezone;
}

// Call updateDate immediately to display the current date
updateDate();

// Set an interval to refresh the date every 1 second (1000 milliseconds)
setInterval(updateDate, 1000);
// Handle the preset date selection
document.getElementById("presetDate").onchange = function() {
  var d = new Date();

  if (this.value == "yesterday") {
    var date_y = new Date(d.setDate(d.getDate() - 1));
    document.getElementById("datePicker1").valueAsDate = date_y;
    document.getElementById("datePicker2").valueAsDate = date_y;

  } else if (this.value == "previousWeek") {
    var dateEnd_pw = new Date(d.setDate(d.getDate() - d.getDay())); // Last Sunday
    var dateStart_pw = new Date(d.setDate(d.getDate() - 6)); // Last Monday
    document.getElementById("datePicker1").valueAsDate = dateStart_pw;
    document.getElementById("datePicker2").valueAsDate = dateEnd_pw;

  } else if (this.value == "previousMonth") {
    var dateEnd_pm = new Date(d.getFullYear(), d.getMonth(), 0); // Last day of previous month
    var dateStart_pm = new Date(dateEnd_pm.getFullYear(), dateEnd_pm.getMonth(), 1); // First day of previous month
    document.getElementById("datePicker1").valueAsDate = dateStart_pm;
    document.getElementById("datePicker2").valueAsDate = dateEnd_pm;

  } else if (this.value == "previousYear") {
    var lastYear = d.getFullYear() - 1;
    document.getElementById("datePicker1").valueAsDate = new Date(lastYear, 0, 1); // January 1st
    document.getElementById("datePicker2").valueAsDate = new Date(lastYear, 11, 31); // December 31st

  } else {
    document.getElementById("datePicker1").value = "";
    document.getElementById("datePicker2").value = "";
  }
};

// Function to ensure the end date cannot be earlier than the start date
document.getElementById("datePicker1").addEventListener("change", function() {
  var startDate = new Date(this.value);
  var endDatePicker = document.getElementById("datePicker2");

  // If the end date is earlier than the start date, adjust it
  if (endDatePicker.value && new Date(endDatePicker.value) < startDate) {
    endDatePicker.valueAsDate = startDate;
  }

  // Set the minimum allowed date for the end date
  endDatePicker.min = this.value;
});

// Function to ensure the start date cannot be later than the end date
document.getElementById("datePicker2").addEventListener("change", function() {
  var endDate = new Date(this.value);
  var startDatePicker = document.getElementById("datePicker1");

  // If the start date is later than the end date, adjust it
  if (startDatePicker.value && new Date(startDatePicker.value) > endDate) {
    startDatePicker.valueAsDate = endDate;
  }

  // Set the maximum allowed date for the start date
  startDatePicker.max = this.value;
});

</script>
@endsection
