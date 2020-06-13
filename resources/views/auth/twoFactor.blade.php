@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('message'))
                <h4 class="alert alert-info">
                    {{ session()->get('message') }}
                </h4>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('verify.store') }}">
                        @csrf
                        <h1> {{ __('Verify Your Email Address') }} </h1>
                        <p class="text-muted">
                            You have received an email contains two factor login code.
                            If you haven't received it, Click <a href="{{route('verify.resend')}}"> Here </a>
                        </p>

                        <div class="form-group row">
                           {{--  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}

                            <div class="col-md-6">
                                <input type="text" name="two_factor_code" class="form-control @error('two_factor_code') is-invalid @enderror"  value="{{ old('two_factor_code') }}" required autofocus>
                                @if ($errors->has('two_factor_code'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('two_factor_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="btn btn-primary px-4">{{ __('Verify') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
