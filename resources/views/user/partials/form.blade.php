@extends('layouts.block')

@section('b-title')
    <h2> <i class="fa fa-user"></i> <strong> Create User  </strong> </h2>
@endsection



@section('b-content')
    <form method="POST" class="form-horizontal form-bordered" action="{{route('users.store') }}" autocomplete="off">
        @csrf

        <div class="form-group @error('name') has-error @enderror @if(session('danger')) has-error @endif">
            <label class="col-md-3 control-label" for="name">Name <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}"                                placeholder="User Name" required autofocus>
                @error('name')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
                @if(session('danger'))
                    <span class="help-block animation-slideDown text-danger">{{session('danger')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group @error('description') has-error @enderror">
            <label class="col-md-3 control-label" for="email">Email <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"                                placeholder="User Email" required >
                @error('email')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group @error('password') has-error @enderror">
            <label class="col-md-3 control-label" for="password">Password <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="password" id="password" name="password" class="form-control" value="" placeholder="User Password" required >
                @error('password')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group @error('contact') has-error @enderror">
            <label class="col-md-3 control-label" for="contact">Contact</label>
            <div class="col-md-9">
                <input type="number" id="contact" name="contact" class="form-control" value="{{ old('contact', $user->contact) }}"                  placeholder="User Contact"  >
                @error('contact')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group @error('user_group_id') has-error @enderror">
            <label class="col-md-3 control-label" for="user_group_id">User Group <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <select id="user_group_id" name="user_group_id" class="form-control" size="1" required>
                    <option value="0">Please select</option>
                    @foreach( $usergroups as $usergroup)
                        <option value="{{ $usergroup->id }}">{{ $usergroup->name }}</option>
                    @endforeach

                </select>

                @error('user_group_id')
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
