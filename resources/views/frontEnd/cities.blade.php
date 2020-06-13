@extends('layouts.frontEndLayout')

@section('header')
    @include('frontEnd.header')
@endsection

@section('content')

<div id="page-content-scroll" class="header-clear-large">
    <div class="content">
        <div class="blog-categories blog-categories-1 small-bottom">
        
            <a href="{{ route('cities.show', $firstCity->id) }}">
                <strong></strong> <em>{{ $firstCity->name }} </em>
                <span class="bg-gray-dark opacity-50"></span>

                <img src="{{ asset('uploads/marquee/city/'.$firstCity->thumbnail) }}" data-src="{{ asset('uploads/marquee/city/'.$firstCity->thumbnail) }}" class="preload-image responsive-image" alt="img">
            </a>

        </div>
        <div class="blog-categories blog-categories-2 small-bottom">

            @forelse ($twoCities as $twoCity)

            <a href="{{ route('cities.show', $twoCity->id) }}">
                <strong></strong><em>{{$twoCity->name}}</em>
                <span class="bg-brown-dark opacity-50"></span>
                <img src="{{ asset('uploads/marquee/city/'.$twoCity->thumbnail) }}" data-src="{{ asset('uploads/marquee/city/'.$twoCity->thumbnail) }}" class="preload-image responsive-image" alt="img">
            </a>
            @empty
                <strong></strong><em> No City Found </em>
            @endforelse

        

            <div class="clear"></div>
        </div>
        <div class="blog-categories blog-categories-3 small-bottom">
            @forelse ($threeCities as $threeCity)

            <a href="{{ route('cities.show', $threeCity->id) }}">
                <strong></strong><em>{{$threeCity->name}}</em>
                <span class="bg-teal-dark opacity-50"></span>
                <img src="{{ asset('uploads/marquee/city/'.$threeCity->thumbnail) }}" data-src="{{ asset('uploads/marquee/city/'.$threeCity->thumbnail) }}" class="preload-image responsive-image" alt="img" style="height: 105px;">
            </a>

            @empty
                <strong></strong><em> No City Found </em>
            @endforelse

          

            <div class="clear"></div>
        </div>
    </div>
</div>

@endsection

@section('footer')
    @include('frontEnd.footer')
@endsection