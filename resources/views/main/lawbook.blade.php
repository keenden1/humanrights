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
<h1>Reference Book</h1>
</div>
</div>
<div id="Box">
    <div class="box-main">
            <a href="https://pcw.gov.ph/assets/files/2020/09/RA-7877.pdf" target="_blank" rel="noopener noreferrer" class="box-box">
                <div class="picture"><img src="{{ asset('image/sample.png') }}" alt="book" ></div>
                <div class="text">
                <h1>REPUBLIC ACT 7877</h1>
                <p>Republic Act 7877, also known as the Anti-Sexual Harassment Act of 1995, is a law in the Philippines that protects people from sexual harassment in the workplace, educational institutions, and public spaces. The law aims to uphold the dignity of individuals and guarantee respect for human rights.</p>
                </div>
            </a>

            <a href="https://library.pcw.gov.ph/wp-content/uploads/2024/09/PCW-Brochure-R.A-9262-Anti-VAWC-Act-English-2024.pdf" target="_blank" rel="noopener noreferrer" class="box-box-2">
                <div class="picture-2"><img src="{{ asset('image/sample1.png') }}" alt="book" ></div>
                <div class="text-2">
                <h1>REPUBLIC ACT 9262</h1>
                <p>Republic Act (RA) 9262, also known as the Anti-Violence Against Women and their Children Act of 2004, is a law that addresses violence against women and children (VAWC)</p>
                </div>
            </a>
    </div>
    <br><br>
    <div class="box-main">
            <a href="https://library.pcw.gov.ph/wp-content/uploads/2022/09/PCW-Brochure-R.A-11210-Expanded-Maternity-Leave-in-English-2024.pdf" class="box-box">
                <div class="picture"><img src="{{ asset('image/ra-11210.png') }}" alt="book" ></div>
                <div class="text">
                <h1>REPUBLIC ACT 11210</h1>
                <p>The 105-Day Expanded Maternity Leave Law (RA 11210 or EML) provides the updated policy on maternity leave that covers females who are workers in the private and public sectors, workers in the informal economy, voluntary contributors to the Social Security System (SSS), and national athletes.</p>
                </div>
            </a>

            <a href="https://library.pcw.gov.ph/wp-content/uploads/2024/09/PCW-Brochure-R.A-11313-Safe-Spaces-Act-English-2024.pdf" class="box-box-2">
                <div class="picture-2"><img src="{{ asset('image/ra-11313.png') }}" alt="book" ></div>
                <div class="text-2">
                <h1>REPUBLIC ACT 11313</h1>
                <p>11313 (known as the “Safe Spaces Act”) with the aim of ensuring the equality, security, and safety of every individual, in both private and public spaces, including online and in workplaces.</p>
                </div>
            </a>
    </div>
</div>
<br><br><br><br><br><br><br><br><br>
@include('layout.footer')
</body>
</html>
