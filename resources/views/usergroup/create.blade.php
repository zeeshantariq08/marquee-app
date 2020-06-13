@extends('layouts.app')


@section('title', 'User Groups')
@section('titleicon', 'fa fa-users')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('usergroup.partials.form', ['usergroup', $usergroup])
        </div>
    </div>
@endsection
