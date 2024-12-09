<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Form</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userpage/complaintsform.css') }}">
    <script src="{{  asset('js/city.js') }}"></script>
</head>
<body>
@include('layout.header')


<div class="container">
  <div class="container-form">
  <header class="header">
    <h1 id="title" class="text-center">INFORMATION FORM</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  </header>
  <form class="cf" action="{{route('user_form_post')}}" method="post">
  @csrf
  <p id="header" class="description" style="display: none;">Fill-up Carefully</p>
  <div class="half left cf">
  <p id="header_" class="description">Fill-up Carefully</p>
  <div class="error-message" style="display: none;">error</div>
  <select id="guardian-info" name="identity" onchange="toggleGuardianInfo(this)" required>
    <option value="" disabled selected>Select Your Role</option>
    <option value="Informant">Informant</option>
    <option value="Victim">Victim</option>
</select>
  <p id="description-Guardian-info" class="description">Informant Information</p>
  <div class="name-group" id="guardian">
    <input type="text" id="first-name-guardian" name="first_name_guardian" placeholder="First Name" >
    <input type="text" id="middle-name-guardian" name="middle_name_guardian" placeholder="M" maxlength="1" >
    <input type="text" id="last-name-guardian" name="last_name_guardian" placeholder="Last Name" >
  </div>
    <input type="text" id="input-relation"  name="relation" placeholder="Relation with the Victim" >
    <p id="description" class="description">Contact Information</p>
    <!-- <input type="email" name="email" id="input-email" placeholder="Email address" required> -->
    <input type="email" name="email" id="input-email" placeholder="Email address" required>
    <input type="text"  name="contact" id="input-contact"  placeholder="Phone number" required maxlength="11" oninput="validateContact(this)">
    <select id="province" name="province" place required>
    </select>
    <select id="city" name="city" place required>
    <option value="" disabled selected>City</option>
    </select>
    <select id="barangay" name="barangay" place required>
   <option value="" disabled selected>barangay</option>
   <input type="text" id="street" name="street" placeholder="Street" required>
    </select>
    <input type="text" id="zipcode" name="zipcode" placeholder="Zip code" maxlength="4" required>


  </div>
  <div class="half right cf">
  <div id="unhide">
  <p id="description" class="description">Victim Information</p>
  <div class="name-group">
    <input type="text" id="first-name" name="firstname" placeholder="First Name" required>
    <input type="text" id="middle-name" name="middlename" placeholder="M" maxlength="1">
    <input type="text" id="last-name" name="lastname" placeholder="Last Name" required>
  </div>
  </div>
  <select id="gender" name="gender">
    <option value="" disabled selected>Sex</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>


  <!-- <label for="date" class="styled-label">Birthdate.</label> -->
  <input type="text" id="input-date" name="birthdate" placeholder="Birthdate" onfocus="setDate(this)" onblur="this.type='text';" required>
<select id="sector" name="sector" onchange="toggleOtherInput()">
    <option value="" disabled selected>Sector</option>
    <option value="Person with Disability (Pwd)">Person with Disability (Pwd)</option>
    <option value="Overseas Filipino Worker (OFW)">Overseas Filipino Worker (OFW)</option>
    <option value="Solo Parent">Solo Parent</option>
    <option value="Senior Citizen">Senior Citizen</option>
    <option value="Other">Other</option>
</select>
<div id="other-sector" style="display: none;" required>
    <input type="text" id="other-sector-input" name="other-sector" placeholder="Please specify your Sector">
</div>
<select id="case" name="case" required onchange="toggleOtherInput()">
    <option value="" disabled selected >Case</option>
    <option value="Bullying">Bullying</option>
    <option value="Rape">Rape</option>
    <option value="Rape">Sexual Abuse</option>
    <option value="Rape">Sexual Harrassment</option>
    <option value="Other">Other</option>
  </select>
  <div id="other-case" style="display: none;">
    <input type="text" id="other-case-input" name="othercase" placeholder="Please specify your Case">
  </div>
    <textarea  name="report" type="text" id="input-message" placeholder="Report" required></textarea>
  </div>
  <input type="hidden" name="user_id" value="{{session('user_id')}}">
 <input type="submit" value="Submit" id="input-submit">
</form>



  </div>
</div>

<br>

@include('layout.footer')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
<script>
   function setDate(input) {
            const today = new Date();
            const dd = String(today.getDate()).padStart(2, '0');
            const mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            const yyyy = today.getFullYear();

            // Set the max date to today
            const maxDate = yyyy + '-' + mm + '-' + dd; // Format as YYYY-MM-DD
            input.type = 'date'; // Change type to date
            input.setAttribute('max', maxDate); // Set max attribute to today
        }



    var today = new Date().toISOString().split('T')[0];
    document.getElementById('dateInput').setAttribute('max', today);

    document.querySelectorAll('textarea').forEach(function(textarea) {
    textarea.addEventListener('input', function() {
        let text = this.value;
        // Capitalize the first letter of the first word and make the rest lowercase
        this.value = text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
    });
});



function validateContact(input) {
    const errorMessage = document.getElementById('error-message');
    const value = input.value;

    const cleanValue = value.replace(/\D/g, '');

    input.value = cleanValue;

    if (cleanValue.length > 11) {
      errorMessage.textContent = '(Please enter a valid 11-digit mobile number.)';
      errorMessage.style.display = 'block';
    } else if (cleanValue.length > 0 && !cleanValue.startsWith('09')) {
      errorMessage.textContent = '(Mobile number must start with 09.)';
      errorMessage.style.display = 'block';
    } else {
      errorMessage.textContent = '';
      errorMessage.style.display = 'none';
    }
  }
  function toggleGuardianInfo(select) {
    const value = select.value;
    
    const guardianInfo = document.getElementById('guardian-info');
    const guardian = document.getElementById('guardian');
    const guardian_ = document.getElementById('description-Guardian-info');
    const guardian__ = document.getElementById('input-relation');
    const text = document.getElementById('input-message');
    
    // Blade variables injected into JavaScript
    const authFirstName = @json(auth()->user()->firstname);
    const authMiddleName = @json(auth()->user()->middlename);
    const authLastName = @json(auth()->user()->lastname);
    const authContact = @json(auth()->user()->contact);
    const authEmail = @json(auth()->user()->user_email);

    const inputContact = document.getElementById('input-contact');
    const inputEmail = document.getElementById('input-email');
    const firstNameGuardian = document.getElementById('first-name-guardian');
    const middleNameGuardian = document.getElementById('middle-name-guardian');
    const lastNameGuardian = document.getElementById('last-name-guardian');

    const firstNameVictim = document.getElementById('first-name');
    const middleNameVictim = document.getElementById('middle-name');
    const lastNameVictim = document.getElementById('last-name');
    
    // Clear all fields first
    function clearFields() {
        firstNameGuardian.value = '';
        middleNameGuardian.value = '';
        lastNameGuardian.value = '';
        inputContact.value = '';
        inputEmail.value = '';
        firstNameVictim.value = '';
        middleNameVictim.value = '';
        lastNameVictim.value = '';
    }

    // Prefill values based on role selection
    if (value === 'Informant') {
        firstNameGuardian.value = authFirstName;
        middleNameGuardian.value = authMiddleName;
        lastNameGuardian.value = authLastName;
        inputContact.value = authContact;
        inputEmail.value = authEmail;
        // Clear victim fields
        firstNameVictim.value = '';
        middleNameVictim.value = '';
        lastNameVictim.value = '';
    } else if (value === 'Victim') {
        firstNameGuardian.value = '';
        middleNameGuardian.value = '';
        lastNameGuardian.value = '';
        inputContact.value = authContact;
        inputEmail.value = authEmail;
        firstNameVictim.value = authFirstName;
        middleNameVictim.value = authMiddleName;
        lastNameVictim.value = authLastName;
    } else {
        clearFields();
    }

    // Toggle visibility based on role
    if (value === 'Victim') {
        guardian.style.display = 'none';
        guardian_.style.display = 'none';
        guardian__.style.display = 'none';
        text.style.height = '193px';
    } else {
        guardian.style.display = 'flex';
        guardian_.style.display = 'block';
        guardian__.style.display = 'block';
        text.style.height = '290px';
    }
}

  function toggleOtherInput() {
    const sectorSelect = document.getElementById('sector');
    const otherSectorInput = document.getElementById('other-sector');

    // Check if "Other" is selected
    if (sectorSelect.value === "Other") {
        otherSectorInput.style.display = 'block'; // Show input field
    } else {
        otherSectorInput.style.display = 'none'; // Hide input field
    }
    const caseSelect = document.getElementById('case');
    const othercaseInput = document.getElementById('other-case');

    // Check if "Other" is selected
    if (caseSelect.value === "Other") {
      othercaseInput.style.display = 'block'; // Show input field
    } else {
      othercaseInput.style.display = 'none'; // Hide input field
    }
}


</script>

<script>
  window.onload = function() {
        var cityHandler = new City();
        cityHandler.showProvinces("#province");

        document.querySelector("#province").onchange = function() {
            var selectedProvince = this.value;
            cityHandler.showCities(selectedProvince, "#city");

            // Reset barangay dropdown when province changes
            document.querySelector("#barangay").innerHTML = "<option selected disabled>Barangay</option>";

            // Attach listener to update barangay dropdown after selecting a city
            cityHandler.showBarangays(selectedProvince, "#city", "#barangay");
        };
    }
</script>
</html>


