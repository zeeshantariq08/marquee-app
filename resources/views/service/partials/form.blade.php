@extends('layouts.block')

@section('b-title')
    <h2> <i class="fa fa-service-hunt"></i> <strong> Add Service  </strong> </h2>
@endsection


@section('b-content')
    <form method="POST" class="form-horizontal form-bordered" action="{{  route('services.store') }}" autocomplete="off">
        
       
        @csrf
       <input type="hidden" name="marquee_id" value="{{ $id}}">
        

        <div class="form-group @error('name') has-error @enderror @if(session('danger')) has-error @endif">
            <label class="col-md-3 control-label" for="name">Title <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $service->name) }}"placeholder=" Service Name" required autofocus>
                @error('name')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
                @if(session('danger'))
                    <span class="help-block animation-slideDown text-danger">{{session('danger')}}</span>
                @endif
            </div>
        </div>
        
        <div class="form-group @error('description') has-error @enderror">
            <label class="col-md-3 control-label" for="description">Description<span class="text-danger"></span></label>
            <div class="col-md-9">
                <textarea id="example-textarea-input" name="description" rows="4" class="form-control" placeholder="Service Description">{{ old('phone_no', $service->description) }}</textarea>
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
