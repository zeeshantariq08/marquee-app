@extends('layouts.app')


@section('title', 'Client Information')
@section('titleicon', 'fa fa-users')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('client.partials.list', ['clients', $clients])
        </div>
    </div>
@endsection
