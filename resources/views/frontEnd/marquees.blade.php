@extends('layouts.frontEndLayout')

@section('header')
    @include('frontEnd.header')
@endsection

@section('content')

<div id="page-content-scroll" class="header-clear-larger">
    <div class="content">
    @forelse ($city->marquees as $row)

        <div class="article-card box-shadow bg-white full-bottom no-border">
            <a href="{{ route('marquee_detail', $row->id) }}" class="article-header">
                <span class="article-overlay"></span>

                <span class="article-image preload-image" data-src-retina="{{ asset('uploads/marquee/thumbnail/'.$row->thumbnail) }}" data-src="{{ asset('uploads/marquee/thumbnail/'.$row->thumbnail) }}"></span>

                <span class="article-category bg-pink-dark color-white uppercase">FEATURED</span>
                
            </a>

            <div class="article-content">
                <h1 class="article-title half-top " style="text-transform: uppercase;">{{$row->name}}</h1>

                <p class="small-bottom"> {{Str::limit($row->description, 150, '...')}}</p>
                <a href="{{ route('marquee_detail', $row->id) }}" class="half-bottom right-text">Find out more <i class="fa fa-angle-right icon-clear-left icon-clear-right"></i></a>
            </div>
        </div>
    @empty
        <div class="article-card box-shadow bg-white full-bottom no-border">
            <h2 class="text-danger text-center"> No Record Found </h2>
            
        </div>
    @endforelse
    
    </div>
</div>

@endsection

@section('footer')
    @include('frontEnd.footer')
@endsection