@extends('layouts.app')


@section('title', $marquee->name)
@section('titleicon', 'fa fa-user')

@section('content')
    <div class="row tab-content">
        <div class="col-sm-4 col-lg-3" id="info">
            @include('marquee.partials.menu')
        </div>
        <div class="col-sm-8 col-lg-9 tab-pane active" id="users">
            @include('marquee.partials.info', ['marquee', $marquee])
        </div>
    </div>
@endsection