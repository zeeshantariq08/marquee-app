@extends('layouts.app')

@section('title', 'Add New City')
@section('titleicon', 'fa fa-building')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Block with Options -->
			<div class="block full">
			    <!-- Block with Options Title -->
			    <div class="block-title">
			    	<h2> <i class="fa fa-plus"></i> <strong> Add New City </strong> </h2>
			        <div class="block-options pull-right">
	                    <a href="{{ route('city.index') }}" class="btn btn-alt btn-sm btn-primary" title="Go To Tender List "><i class="fa fa-building"></i> Cities </a>

			        </div>
			    </div>
			    <!-- END Block with Options Title -->
			    <!-- Block Content -->

			    <div class="block-content">
			        <div class="block-content">

			        	<form  action=" {{ ($city->id) ? route('city.update', $city->id ) : route('city.store') }} " method="post" class="form-horizontal form-bordered"  enctype="multipart/form-data">
			        		@if($city->id) @method('PUT') @endif

					        @csrf

					        <div class="col-12">

						        <div class="form-group col-xs-6 col-md-3 col-md-offset-3 @if($errors->has('name')) has-error @endif">
						            <label class="control-label">Name<span>*</span></label>

						            <input type="text" name="name" class="form-control" value="{{ old('name', $city->name) }}" placeholder="City Name" required autofocus>

						            @if($errors->has('name'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('name')}}
		                                </span>
		                            @endif
						        </div>

						        <div class="form-group col-xs-6 col-md-3 col-md-offset-3 @if($errors->has('thumbnail')) has-error @endif">
						            <label class="control-label">Thumbnail<span></span></label>

						            <input type="file" name="thumbnail" class="form-control" value="{{ old('thumbnail', $city->thumbnail) }}" placeholder="City Name" required autofocus>

						            @if($errors->has('thumbnail'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('thumbnail')}}
		                                </span>
		                            @endif
						        </div>

						    </div>

					        <div class="form-group form-actions">
					            <div class="col-md-12 mt-5">
					                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
					                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
					            </div>
					        </div>
						</form>
			        </div>
			    </div>
			    <!-- END Block Content -->
			</div>
			<!-- END Block with Options -->
        </div>
    </div>

@endsection

