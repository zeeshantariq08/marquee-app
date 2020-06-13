@extends('layouts.block')

@section('b-title')
    <h2> <i class="fa fa-users"></i> <strong> Create User Group </strong> </h2>
@endsection


@section('b-options')
    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Create User"><i class="fa fa-plus"></i></a>
@overwrite

@section('b-content')
    <form method="POST" class="form-horizontal form-bordered" action="{{ ($usergroup->slug) ? route('usergroups.update', $usergroup->slug ) : route('usergroups.store') }}">

        @csrf
        @if($usergroup->slug)
            @method('PUT')
        @else
            @method('POST')
        @endif

        <div class="form-group @error('name') has-error @enderror @if(session('danger')) has-error @endif">
            <label class="col-md-3 control-label" for="name">Name <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $usergroup->name) }}" placeholder="User Group Name" required autofocus>
                @error('name')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
                @if(session('danger'))
                    <span class="help-block animation-slideDown text-danger">{{session('danger')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group @error('description') has-error @enderror">
            <label class="col-md-3 control-label" for="description">Description</label>
            <div class="col-md-9">
                <textarea id="description" name="description" rows="9" class="form-control" placeholder="User Group Description">{{ old('name', $usergroup->description) }}</textarea>
                @error('description')
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
