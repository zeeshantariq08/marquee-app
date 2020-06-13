@extends('layouts.app')


@section('title', 'User')
@section('titleicon', 'fa fa-users')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('user.partials.form', ['user', $user])
        </div>
    </div>
@endsection
