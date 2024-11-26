<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Law-book</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userpage/law.css') }}">
    <script src="{{ asset('js/homepage/homepage.js') }}"></script>
</head>
<body>
@include('layout.header')
<div class="background">
    <img src="{{ asset('logo/logo.png') }}" alt="">
</div>
<div class="Main">
<div class="search-container">
<i class="fa-solid fa-magnifying-glass" id="change"></i>
  <input type="text" placeholder="Search about the law...">
  <button type="submit">Search</button>
</div>
</div>
<div id="Box">
    <div class="box-main">
            <div class="box-box"> 
                <div class="picture"><img src="{{ asset('image/sample.png') }}" alt="book" ></div>
                <div class="text">
                <h1>REPUBLIC ACT 7877</h1>
                <p>Anti-Sexual Harrassment Act of 1995</p>
                </div>
            </div>

            <div class="box-box-2"> 
                <div class="picture-2"><img src="{{ asset('image/sample1.png') }}" alt="book" ></div>
                <div class="text-2">
                <h1>REPUBLIC ACT 9208</h1>
                <p>The Anti-Trafficking in Persons Act of 2003, as amended by the Expanded Anti-Trafficking in Person Act of 2013</p>
                </div>
            </div>
    </div>
    <br><br>
    <div class="box-main">
            <div class="box-box"> 
                <div class="picture"><img src="{{ asset('image/sample.png') }}" alt="book" ></div>
                <div class="text">
                <h1>REPUBLIC ACT 7877</h1>
                <p>Anti-Sexual Harrassment Act of 1995</p>
                </div>
            </div>

            <div class="box-box-2"> 
                <div class="picture-2"><img src="{{ asset('image/sample1.png') }}" alt="book" ></div>
                <div class="text-2">
                <h1>REPUBLIC ACT 9208</h1>
                <p>The Anti-Trafficking in Persons Act of 2003, as amended by the Expanded Anti-Trafficking in Person Act of 2013</p>
                </div>
            </div>
    </div>
</div>

@include('layout.footer')
</body>
</html>