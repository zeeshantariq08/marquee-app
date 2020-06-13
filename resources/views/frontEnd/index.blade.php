@extends('layouts.frontEndLayout')

@section('header')
    @include('frontEnd.header')
@endsection

@section('content')

	<div id="page-content-scroll">
        <div class="single-slider owl-carousel owl-has-dots-over bg-black">
            <div>
                
                <div class="cover-overlay overlay "></div>
                <img width="700" class="owl-lazy" src="{{ asset('frontEnd/images/empty.png') }}" data-src="{{ asset('frontEnd/images/pictures/avlaan.jpg') }}" data-src="{{ asset('frontEnd/images/pictures/10.jpg') }}">
            </div>
            <div>
               
                <div class="cover-overlay overlay "></div>
                <img width="700" class="owl-lazy" src="{{ asset('frontEnd/images/empty.png') }}" data-src="{{ asset('frontEnd/images/pictures/rubaish.jpg') }}" data-src-retina="{{ asset('frontEnd/images/pictures/rubaish.jpg') }}">
            </div>
            <div>
                <div class="cover-overlay overlay "></div>
                <img width="700" class="owl-lazy" src="{{ asset('frontEnd/images/empty.png') }}" data-src="{{ asset('frontEnd/images/pictures/safran.jpg') }}" data-src-retina="{{ asset('frontEnd/images/pictures/safran.jpg') }}">
            </div>
            <div>
                
                <div class="cover-overlay overlay "></div>
                <img width="700" class="owl-lazy" src="{{ asset('frontEnd/images/empty.png') }}" data-src="{{ asset('frontEnd/images/pictures/lavish.jpg') }}" data-src-retina="{{ asset('frontEnd/images/pictures/lavish.jpg') }}">
            </div>
        </div>
        <div class="homepage-cta full-top full-bottom">
            <h1 class="half-top center-text no-bottom font-21">Welcome</h1>
            <h2 class="center-text opacity-40">To The Most MMS App</h2>
            <p class="boxed-text half-bottom">
                MMS allows users to find and book pre-qualified, trusted, and reviewed wedding vendors, get special prices, and find wedding inspirations to realize your dream wedding.
            </p>
            <div class="single-slider-no-timeout owl-carousel owl-auto-height smal-top">
                <div>
                    <div class="homepage-cta-button">
                        <div class="button-center-large"><a href="{{ route('cities.index') }}" class="button button-full button-maroon button-sm button-rounded uppercase ultrabold" style="background: #88211a">BOOK YOUR MARQUEE</a></div>
                        
                    </div>

                   {{--  {{ url("/cities") }} --}}
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('frontEnd.footer')
@endsection