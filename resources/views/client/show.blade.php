@extends('layouts.app')


@section('title', $client->name)
@section('titleicon', 'fa fa-user')

@section('content')
    <div class="row tab-content">
        <div class="col-sm-4 col-lg-3" id="info">
            @include('client.partials.menu')
        </div>
        <div class="col-sm-8 col-lg-9 tab-pane active" id="users">
            @include('client.partials.info', ['client', $client])
        </div>
    </div>
@endsection
