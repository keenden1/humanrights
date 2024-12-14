@extends('layout.officerheader')

@section('title', 'Officer-Setting')

@section('content')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/officer/setting.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/officer/newstyle.css') }}">

  <div class="float-float">
    <p>Settings</p>
  </div>

  <div class="experiment">
    <div class="table-container">
      <div class="setts">
        <div class="main">
          <div class="main__content">
            <!-- Single form for both avatar and other fields -->
            <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <!-- Avatar Section -->
              <div class="main__avatar">
                <!-- File input for uploading profile image -->
                <label for="profile_image" class="main__avatar--overlay">
                  Change Photo
                </label>
                <input
                  type="file"
                  id="profile_image"
                  name="profile_image"
                  class="main__input-file"
                  accept="image/*"
                  onchange="previewImage(event)"
                />
                <!-- Display current or default profile image -->
                <img
                  id="profile_image_preview"
                  src="{{ $admin->profile_image ? asset('storage/' . $admin->profile_image) : asset('logo/logo.png') }}"
                  alt="Profile Image"
                  class="main__avatar--img"
                />
              </div>

              <!-- Success and Error Messages -->
              @if (session('success'))
                <div class="alert alert-success" style="color: #8ED081;">
                  <strong>{{ session('success') }}</strong>
                </div>
              @endif

              @if ($errors->any())
                <div class="alert alert-danger" style="color: red;">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <!-- Main Settings Form -->
              <div class="main__settings-form">
                <section class="centered">
                  <div>
                    <label class="main__input-label">First name:</label>
                    <input
                      class="main__input"
                      type="text"
                      name="firstname"
                      id="firstname"
                      value="{{ $admin->fname }}"
                      required
                    />

                    <label class="main__input-label">Your e-mail:</label>
                    <input
                      class="main__input"
                      type="text"
                      name="email"
                      id="email"
                      value="{{ $admin->admin_email }}"
                      required
                    />
                  </div>

                  <div>
                    <label class="main__input-label">Middle Name:</label>
                    <input
                      class="main__input"
                      type="text"
                      name="middlename"
                      id="middlename"
                      value="{{ $admin->mname }}"
                    />

                    <label class="main__input-label">Username:</label>
                    <input
                      class="main__input"
                      type="text"
                      name="motto"
                      id="motto"
                      value="{{ $admin->admin_username }}"
                    />
                  </div>

                  <div>
                    <label class="main__input-label">Last Name:</label>
                    <input
                      class="main__input"
                      type="text"
                      name="lastname"
                      id="lastname"
                      value="{{ $admin->lname }}"
                      required
                    />

                    <label class="main__input-label">Motto:</label>
                    <input
                      class="main__input"
                      type="text"
                      name="motto"
                      id="motto"
                      value="{{ $admin->motto }}"
                    />
                  </div>
                </section>

                <section class="centered">
                  <button class="btn main__save-button" type="submit">Update Information</button>
                </section>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    .main__avatar {
      width: 150px;
      height: 150px;
      display: block;
      margin: 20px auto;
      border-radius: 50%;
      overflow: hidden;
      position: relative;
    }

    .main__avatar--img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .main__avatar--overlay {
      position: absolute;
      bottom: 0;
      width: 100%;
      text-align: center;
      background: rgba(0, 0, 0, 0.5);
      color: white;
      padding: 5px 0;
      font-size: 14px;
      cursor: pointer;
    }

    .main__input-file {
      display: none; /* Hide the file input */
    }
  </style>

  <script>
    // JavaScript function to preview the selected image
    function previewImage(event) {
      const reader = new FileReader();
      reader.onload = function () {
        const output = document.getElementById('profile_image_preview');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
@endsection
