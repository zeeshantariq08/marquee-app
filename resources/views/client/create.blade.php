@extends('layouts.app')


@section('title', 'Product')
@section('titleicon', 'fa fa-users')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('client.partials.form', ['client', $client])
        </div>
    </div>
@endsection