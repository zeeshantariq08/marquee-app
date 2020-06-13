@extends('layouts.app')


@section('title', 'Gallery')
@section('titleicon', 'fa fa-image')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('gallery.partials.list', ['gallerys', $gallerys])
        </div>
    </div>
@endsection
