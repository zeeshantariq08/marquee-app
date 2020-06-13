@extends('layouts.app')


@section('title', 'Marquee')
@section('titleicon', 'fa fa-building')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('marquee.partials.form', ['marquee', $marquee])
        </div>
    </div>
@endsection