<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsfeed</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userpage/news.css') }}">
    <script src="{{ asset('js/homepage/homepage.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>
<body>
@include('layout.header')

<div class="homepage-latest">
    <div class="header">
    <h2>Latest News </h2>
    </div>
<section class="section slider-section">
  <div class="container slider-column">
    <div class="swiper swiper-slider">
      <div class="swiper-wrapper">
        <img class="swiper-slide" src="{{ asset('news/' . $newsfeed->image_1) }}" alt="Swiper">
        <img class="swiper-slide" src="{{ asset('news/' . $newsfeed->image_2) }}" alt="Swiper">
        <img class="swiper-slide" src="{{ asset('news/' . $newsfeed->image_3) }}" alt="Swiper">
        <img class="swiper-slide" src="{{ asset('news/' . $newsfeed->image_1) }}" alt="Swiper">
        <img class="swiper-slide" src="{{ asset('news/' . $newsfeed->image_2) }}" alt="Swiper">
        <img class="swiper-slide" src="{{ asset('news/' . $newsfeed->image_3) }}" alt="Swiper">
      </div>
      <span class="swiper-pagination"></span>
      <span class="swiper-button-prev"></span>
      <span class="swiper-button-next"></span>
    </div>
  </div>
  <p>{{ $newsfeed->story }}</p>
</section>
</div>
@include('layout.footer')
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper(".swiper-slider", {
        centeredSlides: true,
        slidesPerView: 1,
        grabCursor: true,
        freeMode: false,
        loop: true,
        mousewheel: false,
        keyboard: {
            enabled: true
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: false,
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        breakpoints: {
            640: {
                slidesPerView: 1.25,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 20
            }
        }
    });
});

</script>
</body>
</html>