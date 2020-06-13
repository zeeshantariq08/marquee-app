@extends('layouts.app')

@section('title', 'Add New Menu')
@section('titleicon', 'fa fa-building')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Block with Options -->
			<div class="block full">
			    <!-- Block with Options Title -->
			    <div class="block-title">
			    	<h2> <i class="fa fa-plus"></i> <strong> Add New Menu </strong> </h2>
			        <div class="block-options pull-right">
	                    <a href="{{ route('marquee.menu.index', $marquee->id) }}" class="btn btn-alt btn-sm btn-primary" title="Go To Tender List "><i class="fa fa-building"></i> Menus </a>

			        </div>
			    </div>
			    <!-- END Block with Options Title -->
			    <!-- Block Content -->

			    <div class="block-content">
			        <div class="block-content">

			        	<form  action="{{ ($menu->id) ? route('marquee.menu.update', [$marquee->id, $menu->id] ) : route('marquee.menu.store', $marquee->id) }} " method="post" class="form-horizontal form-bordered" >

			        		@if($menu->id) @method('PUT') @endif

					        @csrf

					        <div class="col-12">

						        <div class="form-group col-xs-6 col-md-4 @if($errors->has('name')) has-error @endif">
						            <label class="control-label">Name<span>*</span></label>

						            <input type="text" name="name" class="form-control" value="{{ old('name', $menu->name) }}" placeholder="menu Name" required autofocus>

						            @if($errors->has('name'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('name')}}
		                                </span>
		                            @endif

						        </div>

						        <div class="form-group col-xs-6 col-md-4 @if($errors->has('price')) has-error @endif">
						            <label class="control-label">price<span>*</span></label>

						            <input type="text" name="price" class="form-control" value="{{ old('price', $menu->price) }}" placeholder="menu price" required>

						            @if($errors->has('price'))
		                                <span class="help-block animation-slideDown text-danger">
		                                	{{$errors->first('price')}}
		                                </span>
		                            @endif

						        </div>

						        <div class="col-xs-12 col-md-4 " style="margin-top: 47px;">
					                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
					                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
					            </div>

						    </div>

					        <div class="form-group form-actions">
					            
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