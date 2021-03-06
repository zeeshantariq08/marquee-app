@extends('layouts.app')

@section('title', 'Cities')
@section('titleicon', 'fa fa-building')

@section('content')

    <div class="row">
        <div class="col-12">
        	<!-- Block with Options -->
			<div class="block full">
			    <!-- Block with Options Title -->
			    <div class="block-title">
			    	<h2> <i class="fa fa-building"></i> <strong> Cities </strong> </h2>
			        <div class="block-options pull-right">
	                    <a href="{{ route('city.create') }}" class="btn btn-alt btn-sm btn-primary" title="Add New City"><i class="fa fa-plus"></i> Add </a>
			        </div>
			    </div>
			    <!-- END Block with Options Title -->
			    <!-- Block Content -->
			    <div class="block-content">
			        <div class="block-content">
			        	<div class="table-responsive">
			                <table class="table dataTable table-vcenter table-condensed table-bordered table-hover">
			                    <thead>
			                    	<tr>
								        <th class="text-center">ID</th>
								        <th>Name</th>
								        <th>Thumbnail</th>
								        <th class="text-center">Action</th>
								    </tr>
			                    </thead>
			                    <tbody>
			                    	@forelse ($cities as $city)
				                    	<tr>
							                <td class="text-center"> {{ $city->id }} </td>
							                <td> {{ $city->name }} </td>
							                <td> {{ $city->thumbnail }} </td>

							                <td class="text-center">
												<div class="btn-group-sm">
													<a href="{{ route('city.edit', $city->id ) }}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Edit">
														<i class="fa fa-pencil"></i>
													</a>

													<a href="{{ route('city.destroy', $city->id) }}" data-toggle="tooltip" title="" class="btn btn-danger confirm-delete" data-original-title="Delete">
														<i class="fa fa-remove"></i>
													</a>

												</div>
											</td>
							            </tr>
							            @empty

							            <tr>
							            	<td class="text-center text-danger" colspan="3">
							            	<b> Do data Found </b> 
							            	</td>
								        </tr>

						            @endforelse


			                </table>
			            </div>
			        </div>
			    </div>
			    <!-- END Block Content -->
			</div>
			<!-- END Block with Options -->
        </div>
        
        <form method="post" id="delete-form"> 
            @method('DELETE')
            @csrf

        </form>

    </div>
@endsection


