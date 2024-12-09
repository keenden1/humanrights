@extends('layout.officerheader')

@section('title', 'Content')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/officer/content.css') }}">
<div class="float-float">

    <p>Content</p>
</div>
<div class="experiment">
    <br><br><br>
<div class="table-container">
                    <a href="#case" class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Case</h2>
                            <p>{{ $casecount}}</p>
                        </span>
                    </div>
                    </a>
                    <a href="#sector"  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Sector</h2>
                            <p>{{ $sectorcount}}</p>
                        </span>
                    </div>
                    </a>
                    <a href="#news"  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Newsfeed</h2>
                            <p>{{ $newscount}}</p>
                        </span>
                    </div>
                    </a>
                    <a href="#book"  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Ref Book</h2>
                            <p>{{ $bookcount}}</p>
                        </span>
                    </div>
                    </a>
                    <a href="#forum"  class="colors">
                    <div class="box_1">
                        <span>
                            <h2>Forum</h2>
                            <p>{{ $forumcount}}</p>
                        </span>
                    </div>
                    </a>
        </div>
        <br><br>

<div class="table-container2" id="case">
        <h1 id="centered">Content Cases</h1>
        <button style="position:absolute;left:5%; top:0;" onclick="showModal()">ADD+</button>
       <div class="table-wrapper">
       <table >
            <thead>
                <tr>
                    <th style="text-align: left;">Date</th>
                    <th style="text-align: left;">Case</th>
                    <th style="text-align: left;">Added By</th>
                    <th style="text-align: left;" colspan="2">Detail</th>
                </tr>
            </thead>
            
            <tbody id="table-body">
            @if($case->isEmpty())
            <tr>
            <td colspan="4" style="text-align: center;">No Content Cases</td>
            </tr>
            @else
            @foreach($case as $cases)
                <tr>
                   <td>{{ $cases->created_at->format('M. d, Y') ?? "N/A" }}</td>
                   <td>{{ $cases->case ?? "N/A" }}</td>
                   <td>{{ $cases->created_by ?? "N/A" }}</td>
                   <td style="width:200px;">
                    <a href="#" class="btn1">Update</a>
                    <form action="{{ route('content.case.destroy', $cases->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this case?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn2">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                    </td>
                </tr> 
                @endforeach
                @endif     
            </tbody>
            </div>
        </table>
        </div>

</div>
<div class="table-container2" id="sector">
        <h1 id="centered">Content Sector</h1>
        <button style="position:absolute;left:5%; top:0;" onclick="showModalone()">ADD+</button>
       <div class="table-wrapper">
       <table >
            <thead>
                <tr>
                    <th style="text-align: left;">Date</th>
                    <th style="text-align: left;">Case</th>
                    <th style="text-align: left;">Added By</th>
                    <th style="text-align: left;" colspan="2">Detail</th>
                </tr>
            </thead>
            
            <tbody id="table-body">
            @if($sector->isEmpty())
            <tr>
            <td colspan="4" style="text-align: center;">No Content Cases</td>
            </tr>
            @else
            @foreach($sector as $sectors)
                <tr>
                   <td>{{ $cases->created_at->format('M. d, Y') ?? "N/A" }}</td>
                   <td>{{ $sectors->sector ?? "N/A" }}</td>
                   <td>{{ $sectors->created_by ?? "N/A" }}</td>
                   <td style="width:200px;">
                    <a href="#" class="btn1">Update</a>
                    <form action="{{ route('content.sector.destroy', $sectors->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this case?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn2">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                    </td>
                </tr> 
                @endforeach
                @endif      
            </tbody>
            </div>
        </table>
        </div>
</div>
<div class="table-container2" id="news">
        <h1 id="centered">Content Newsfeed</h1>
        <button style="position:absolute;left:5%; top:0;" onclick="showModaltwo()">ADD+</button>
       <div class="table-wrapper">
       <table >
            <thead>
                <tr>
                    <th style="text-align: left;">Date</th>
                    <th style="text-align: left;">Title</th>
                    <th style="text-align: left;">Details</th>
                    <th style="text-align: left;" colspan="2">Detail</th>
                </tr>
            </thead>
            
            <tbody id="table-body">
            @if($news->isEmpty())
            <tr>
            <td colspan="4" style="text-align: center;">No Content Cases</td>
            </tr>
            @else
            @foreach($news as $new)
                <tr>
                   <td>{{ $new->date ?? "N/A" }}</td>
                   <td>{{ $new->title ?? "N/A" }}</td>
                   <td>{{ Str::words($new->story ?? "N/A", 5, '...') }}</td>
                   <td style="width:200px;">
                    <a href="#" class="btn1">Update</a>
                    <form action="{{ route('content.news.destroy', $new->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this case?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn2">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                    </td>
                </tr> 
                @endforeach
                @endif   
            </tbody>
            </div>
        </table>
        </div>
</div>
<div class="table-container2" id="book">
        <h1 id="centered">Content Book</h1>
        <button style="position:absolute;left:5%; top:0;" onclick="showModalthree()">ADD+</button>
       <div class="table-wrapper">
       <table >
            <thead>
                <tr>
                    <th style="text-align: left;">Date</th>
                    <th style="text-align: left;">Case</th>
                    <th style="text-align: left;">Added By</th>
                    <th style="text-align: left;" colspan="2">Detail</th>
                </tr>
            </thead>
            
            <tbody id="table-body">
            @if($book->isEmpty())
            <tr>
            <td colspan="4" style="text-align: center;">No Content Cases</td>
            </tr>
            @else
            @foreach($book as $books)
                <tr>
                   <td>{{ $books->created_at->format('M. d, Y') ?? "N/A" }}</td>
                   <td>{{ $books->book ?? "N/A" }}</td>
                   <td>{{ $books->created_by ?? "N/A" }}</td>
                   <td style="width:200px;">
                    <a href="#" class="btn1">Update</a>
                    <form action="{{ route('content.book.destroy', $books->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this case?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn2">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                    </td>
                </tr> 
                @endforeach
                @endif      
            </tbody>
            </div>
        </table>
        </div>
</div>
<div class="table-container2" id="forum">
        <h1 id="centered">Content Forum</h1>
        <button style="position:absolute;left:5%; top:0;" onclick="showModalfour()">ADD+</button>
       <div class="table-wrapper">
       <table >
            <thead>
                <tr>
                    <th style="text-align: left;">Date</th>
                    <th style="text-align: left;">Case</th>
                    <th style="text-align: left;">Added By</th>
                    <th style="text-align: left;" colspan="2">Detail</th>
                </tr>
            </thead>
            
            <tbody id="table-body">
            @if($forum->isEmpty())
            <tr>
            <td colspan="4" style="text-align: center;">No Content Cases</td>
            </tr>
            @else
            @foreach($forum as $forums)
                <tr>
                   <td>{{ $forums->created_at->format('M. d, Y') }}</td>
                   <td>{{ $forums->forum}}</td>
                   <td>{{ $forums->created_by}}</td>
                   <td style="width:200px;">
                    <a href="#" class="btn1">Update</a>
                    <form action="{{ route('content.forum.destroy', $forums->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this case?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn2">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                    </td>
                </tr> 
                @endforeach
                @endif   
            </tbody>
            </div>
        </table>
        </div>
</div>






<div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 id="centered">Add Case Title</h2>
        <form action="{{ route('Content.Case') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="case">Case Title:</label>
                <input type="text" name="case" id="case" required>
            </div>
            <input type="hidden" name="created_by" value="{{ session('admin_email') }}">
            <div class="form-group" id="centered">
                <button type="submit" style="margin-right: 40px">Add</button>
            </div>
        </form>
        </div>
        </div>




   <div id="updateModalone" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModalone()">&times;</span>
        <h2 id="centered">Add Sector</h2>
        <form action="{{ route('Content.Sector') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="sector">Sector:</label>
                <input type="text" name="sector" id="sector" required>
            </div>
            <input type="hidden" name="created_by" value="{{ session('admin_email') }}">
            <div class="form-group" id="centered">
                <button type="submit" style="margin-right: 40px">Add</button>
            </div>
        </form>
        </div>
        </div>


        <div id="updateModaltwo" class="modal" >
    <div class="modal-content" style="border:2px solid red; height:500px;  overflow: auto;">
        <span class="close" onclick="closeModaltwo()">&times;</span>
        <h2 id="centered">ADD Newsfeed</h2>
        <form action="{{ route('Content.News') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" value="" required>
            </div>
            <div class="form-group">
                <label for="story">Story:</label>
                <textarea name="story" id="story" rows="4" required style="width:100%;" placeholder="250 words only" maxlength="250"></textarea>
            </div>
            <div class="form-group">
                <label for="image_1">Image 1:</label>
                <input type="file" name="image_1" id="image_1" onchange="displayImage('image_1', 'image_display_1')">
                <img id="image_display_1" style="display:none; width: 100px; height: auto;" alt="Image 1 Preview">
            </div>
            <div class="form-group">
                <input type="file" id="image_2" onchange="displayImage('image_2', 'image_display_2')">
                <img id="image_display_2" style="display:none; width: 100px; height: auto;" alt="Image 2 Preview">
            </div>
            <div class="form-group">
                <input type="file" id="image_3" onchange="displayImage('image_3', 'image_display_3')">
                <img id="image_display_3" style="display:none; width: 100px; height: auto;" alt="Image 3 Preview">
            </div>
            <div class="form-group" id="centered">
                <button type="submit" style="margin-right: 40px">Add Newsfeed</button>
            </div>
        </form>
        </div>
        </div>


        <div id="updateModalthree" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModalthree()">&times;</span>
        <h2 id="centered">ADD WALK-IN</h2>
        <form action="" method="POST">
            @csrf
            @method('PUT') 
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" value="" required>
            </div>
            <div class="form-group">
                <label for="lastname">Middle Name:</label>
                <input type="text" name="middlename" id="middlename" placeholder="optional"  value="" >
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" value="" required>
            </div>
           
            <div class="form-group" id="centered" >
                <button type="submit" style="margin-right: 40px">Update</button>
            </div>
        </form>
        </div>
        </div>

        <div id="updateModalfour" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModalfour()">&times;</span>
        <h2 id="centered">Add Forum Title:</h2>
        <form action="{{ route('Content.Forum') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="forum">Title:</label>
                <input type="text" name="forum" id="forum" required>
            </div>
            <input type="hidden" name="created_by" value="{{ session('admin_email') }}">
            <div class="form-group" id="centered">
                <button type="submit" style="margin-right: 40px">Add</button>
            </div>
        </form>
        </div>
        </div>






<!-- Scroll to Top Button -->
<div id="scrollToTop" class="scroll-to-top">
  <i class="fa-solid fa-caret-up" style="  font-size: 14px;"></i>
</div>

<style>
    /* Custom Scrollbar */
.modal-content::-webkit-scrollbar {
    width: 10px; /* Width of the scrollbar */
}

.modal-content::-webkit-scrollbar-track {
    background: #f1f1f1; /* Light gray background for the track */
    border-radius: 10px; /* Rounded edges */
}

.modal-content::-webkit-scrollbar-thumb {
    background: #888; /* Darker gray for the thumb */
    border-radius: 10px; /* Rounded edges */
}

.modal-content::-webkit-scrollbar-thumb:hover {
    background: #555; /* Darker shade when hovering over the thumb */
}

/* For Firefox */
.modal-content {
    scrollbar-width: thin; /* Thin scrollbar */
    scrollbar-color: #888 #f1f1f1; /* Thumb color and track color */
}
    /* Scroll to Top Button */
.scroll-to-top {
  position: fixed;
  bottom: 20px; /* Distance from the bottom */
  right: 20px; /* Distance from the right */
  display: none; /* Hidden by default */
  background-color: #007bff; /* Button background color */
  color: #fff; /* Icon color */
  border-radius: 50%; /* Make it round */
  width: 50px; /* Button size */
  height: 50px;
  justify-content: center; /* Center the icon */
  align-items: center;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow */
  cursor: pointer;
  z-index: 1000; /* Ensure it appears above other elements */
  transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
}

.scroll-to-top:hover {
  background-color: #0056b3; /* Darker on hover */
  transform: scale(1.1); /* Slightly larger on hover */
}

      .left_col {
    height: 450vh !important;
    }
    #centered{
        position: relative;
        width: 100%;
        text-align: center;
    }
    .table-container2{
        position: relative;
        border: 1px solid #333;
        background-color: #fff;
        margin: 50px;
    }
    .table-wrapper{
        height: 400px;
        overflow-y: auto; 
        overflow-x: auto;
    }
    table{
        width: 100%;
        border-collapse: collapse;
    }
    th{
       position: sticky;
       top: 0;
    }
    .btn1, .btn2 {
  font-size: 14px;
  font-weight: 500;
  padding: 6px 12px;
  border-radius: 4px;
  text-decoration: none;
  border: 1px solid transparent;
  cursor: pointer;
  transition: all 0.3s ease;
}
.btn1 {
  background-color: #007bff; /* Blue */
  color: white;
  border: 1px solid #007bff;
}

.btn1:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}

/* Styling for Trash button */
.btn2 {
  background-color: #f8f9fa; /* Neutral background */
  color: #dc3545; /* Danger red */
  border: 1px solid #ddd;
  padding: 6px;
  border-radius: 50%; /* Circle button */
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  margin-left: 8px;
}

.btn2:hover {
  background-color: #f8d7da; /* Light red hover */
  color: #a71d2a; /* Darker red */
  border-color: #f5c6cb;
}

/* Icon inside trash button */
.btn2 i {
  font-size: 14px;
  line-height: 1;
}
.table-wrapper::-webkit-scrollbar {
  width: 8px; /* Width of vertical scrollbar */
  height: 8px; /* Height of horizontal scrollbar */
}

.table-wrapper::-webkit-scrollbar-thumb {
  background: #888; /* Scrollbar thumb color */
  border-radius: 4px; /* Rounded corners */
}

.table-wrapper::-webkit-scrollbar-thumb:hover {
  background: #555; /* Darker on hover */
}

.table-wrapper::-webkit-scrollbar-track {
  background: #f1f1f1; /* Scrollbar track color */
}


.modal {
        position: relative;
        display: none; 
        position: fixed; 
        z-index: 1; 
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
    .alert {
        position: fixed;
        top: 10px;
        right: 140px;
        z-index: 9999;
        padding: 15px;
        border-radius: 5px;
        display: none; 
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .alert-success {
        background-color: #28a745;
        color: white;
    }

    .alert-danger {
        background-color: #dc3545;
        color: white;
    }
</style>
   <script>
    // Show/Hide the button based on scroll position
window.addEventListener("scroll", function () {
  const scrollToTop = document.getElementById("scrollToTop");
  if (window.scrollY > 200) {
    scrollToTop.style.display = "flex"; // Show the button
  } else {
    scrollToTop.style.display = "none"; // Hide the button
  }
});

// Scroll to top on button click
document.getElementById("scrollToTop").addEventListener("click", function () {
  window.scrollTo({
    top: 0,
    behavior: "smooth", // Smooth scrolling
  });
});

   </script>
<script>
// JavaScript to open and close the modal
function showModal() {
    document.getElementById("updateModal").style.display = "block";
}

function showModalone() {
    document.getElementById("updateModalone").style.display = "block";
}

function showModaltwo() {
    document.getElementById("updateModaltwo").style.display = "block";
}

function showModalthree() {
    document.getElementById("updateModalthree").style.display = "block";
}
function showModalfour() {
    document.getElementById("updateModalfour").style.display = "block";
}

function closeModal() {
    document.getElementById("updateModal").style.display = "none";
}
function closeModalone() {
    document.getElementById("updateModalone").style.display = "none";
}
function closeModaltwo() {
    document.getElementById("updateModaltwo").style.display = "none";
}
function closeModalthree() {
    document.getElementById("updateModalthree").style.display = "none";
}
function closeModalfour() {
    document.getElementById("updateModalfour").style.display = "none";
}
// Close the modal if clicked outside
window.onclick = function(event) {
    if (event.target == document.getElementById("updateModal")) {
        closeModal();
    }
    if (event.target == document.getElementById("updateModalone")) {
        closeModalone();
    }
    if (event.target == document.getElementById("updateModaltwo")) {
        closeModaltwo();
    }
    if (event.target == document.getElementById("updateModalthree")) {
        closeModalthree();
    }
    if (event.target == document.getElementById("updateModalfour")) {
        closeModalfour();
    }
}
</script>
<script>
    window.onload = function () {
    checkForSelectedImages();
};

// Function to check for selected images on page load
function checkForSelectedImages() {
    checkForSelectedImage('image_1', 'image_display_1');
    checkForSelectedImage('image_2', 'image_display_2');
    checkForSelectedImage('image_3', 'image_display_3');
}

// Function to check if a file is selected and display the image
function checkForSelectedImage(inputId, imageId) {
    var fileInput = document.getElementById(inputId);
    var imageDisplay = document.getElementById(imageId);

    if (fileInput.files.length > 0) {
        imageDisplay.style.display = 'inline-block';
    } else {
        imageDisplay.style.display = 'none';
    }
}

// Function to handle file input changes and display the selected image
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
                imageDisplay.style.display = 'inline-block';
            };
        } else {
            imageDisplay.alt = 'Selected file is not an image.';
            imageDisplay.style.display = 'none';
        }
    } else {
        imageDisplay.style.display = 'none';
    }
}

</script>
@endsection
