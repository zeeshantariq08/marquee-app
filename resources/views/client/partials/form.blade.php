@extends('layouts.block')

@section('b-title')
    <h2> <i class="fa fa-client-hunt"></i> <strong> Add Client  </strong> </h2>
@endsection


@section('b-content')
    <form method="POST" class="form-horizontal form-bordered" action="{{ ($client->slug) ? route('clients.update', $client->slug ) : route('clients.store') }}" autocomplete="off">
        
       
        @csrf
        @if($client->slug)
            @method('PUT')
        @else
            @method('POST')
        @endif

        <div class="form-group @error('name') has-error @enderror @if(session('danger')) has-error @endif">
            <label class="col-md-3 control-label" for="name">Name <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $client->name) }}"placeholder=" client Name" required autofocus>
                @error('name')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
                @if(session('danger'))
                    <span class="help-block animation-slideDown text-danger">{{session('danger')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group @error('address') has-error @enderror">
            <label class="col-md-3 control-label" for="address">Address<span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $client->address) }}"       placeholder="Client Address" required >
                @error('address')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group @error('email') has-error @enderror">
            <label class="col-md-3 control-label" for="email">Email<span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $client->email) }}"placeholder="Client Email" required >
                @error('email')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group @error('phone_no') has-error @enderror">
            <label class="col-md-3 control-label" for="phone_no">Phone No<span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="number" id="phone_no" name="phone_no" class="form-control" value="{{ old('phone_no', $client->phone_no) }}"       placeholder="Client Phone No" required >
                @error('phone_no')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group form-actions">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
            </div>
        </div>
    </form>
@endsection
