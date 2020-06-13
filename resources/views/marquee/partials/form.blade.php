@extends('layouts.block')

@section('b-title')
    <h2> <i class="fa fa-marquee-hunt"></i> <strong> Add Marquee  </strong> </h2>
@endsection


@section('b-content')
    <form method="POST" class="form-horizontal form-bordered" action="{{ ($marquee->slug) ? route('marquees.update', $marquee->slug ) : route('marquees.store') }}" enctype="multipart/form-data" autocomplete="off">
        
       
        @csrf
        @if($marquee->slug)
            @method('PUT')
        @else
            @method('POST')
        @endif
        

        <div class="form-group @error('name') has-error @enderror @if(session('danger')) has-error @endif">
            <label class="col-md-3 control-label" for="name">Name <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $marquee->name) }}"placeholder=" Marquee Name" required autofocus>
                @error('name')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
                @if(session('danger'))
                    <span class="help-block animation-slideDown text-danger">{{session('danger')}}</span>
                @endif
            </div>
        </div>

        <div class="form-group @error('city_id') has-error @enderror">
            <label class="col-md-3 control-label" for="city_id">Select City <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <select id="city_id" name="city_id" class="form-control" size="1" required>
                    <option value="0">Please select</option>
                    @forelse( $cities as $city)
                        <option @if ($marquee->city_id === $city->id) selected  @endif  value="{{ $city->id }}">{{ $city->name }}</option>
                    @empty
                    <option value="0">Add City First </option>
                    @endforelse

                </select>

                @error('city_id')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group @error('address') has-error @enderror">
            <label class="col-md-3 control-label" for="address">Address<span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $marquee->address) }}"       placeholder="Marquee Address" required >
                @error('address')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group @error('email') has-error @enderror">
            <label class="col-md-3 control-label" for="email">Email<span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $marquee->email) }}"placeholder="Marquee Email" required >
                @error('email')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group @error('phone_no') has-error @enderror">
            <label class="col-md-3 control-label" for="phone_no">Phone No<span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="number" id="phone_no" name="phone_no" class="form-control" value="{{ old('phone_no', $marquee->phone_no) }}"       placeholder="Marquee Phone No" required >
                @error('phone_no')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group @error('thumbnail') has-error @enderror">
            <label class="col-md-3 control-label" for="thumbnail">Thumbnail <span class="text-danger"></span></label>
            <div class="col-md-9">
                <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                @error('thumbnail')
                <span class="help-block animation-slideDown text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group @error('description') has-error @enderror">
            <label class="col-md-3 control-label" for="description">Description<span class="text-danger"></span></label>
            <div class="col-md-9">
                <textarea id="example-textarea-input" name="description" rows="4" class="form-control" placeholder="Marquee Description">{{ old('phone_no', $marquee->description) }}</textarea>
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
