@extends('layouts.app')


@section('title', 'Services')
@section('titleicon', 'fa fa-server')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('service.partials.form', ['service', $service])
        </div>
    </div>
@endsection