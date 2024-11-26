<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsfeed</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userpage/newslist.css') }}">
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

    <div class="news-container">
    @if($news->isEmpty())
            <tr>
                <td colspan="6" style="text-align: center;">No Cases</td>
            </tr>
            @else
            @foreach($news as $newsfeed)
    <a href="{{ route('newsfeed.show', $newsfeed->id) }}">
     <figure class="snip1253">
    <div class="image"><img src="{{ asset('news/' . $newsfeed->image_1) }}" alt="sample52"/></div>
    <figcaption>
        <div class="date"><span class="day">{{ date('M', strtotime($newsfeed->date)) }}</span></span><span class="month">{{ date('Y', strtotime($newsfeed->date)) }}</span></span></div>
        <h3>{{ $newsfeed->title }}</h3>
        <p>
        {{ Str::words($newsfeed->story, 20, ' [..]') }}
        </p>
    </figure>
    </a>
    
    @endforeach
    @endif
    </div>
</div>
@include('layout.footer')

<style>
   
</style>
</body>
</html>









