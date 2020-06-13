@extends('layouts.app')


@section('title', 'Marquee')
@section('titleicon', 'fa fa-building')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('marquee.partials.list', ['marquees', $marquees])
        </div>
    </div>
@endsection
