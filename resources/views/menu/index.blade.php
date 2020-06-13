@extends('layouts.app')

@section('title', $marquee->name.' Menus')
@section('titleicon', 'fa fa-building')

@section('content')

    <div class="row">
        <div class="col-12">
        	<!-- Block with Options -->
			<div class="block full">
			    <!-- Block with Options Title -->
			    <div class="block-title">
			    	<h2> <i class="fa fa-building"></i> <strong>{{$marquee->name }} Menus </strong> </h2>
			        <div class="block-options pull-right">
	                    <a href="{{ route('marquee.menu.create', $marquee->id) }}" class="btn btn-alt btn-sm btn-primary" title="Add New Menu"><i class="fa fa-plus"></i> Add </a>
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
								        <th>Price</th>
								        <th>Dishes</th>
								        <th class="text-center">Action</th>
								    </tr>
			                    </thead>
			                    <tbody>
			                    	@forelse ($menus as $menu)
				                    	<tr>
							                <td class="text-center"> {{ $menu->id }} </td>
							                <td> {{ $menu->name }} </td>
							                <td> {{ $menu->price }} </td>

							                <td>
								                <a href="{{ route('menu.dishes.index', $menu->id) }}" class="btn btn-alt btn-xs btn-primary">Dishes</a>

								            </td>

							                <td class="text-center">
												<div class="btn-group-sm">
													<a href="{{ route('marquee.menu.edit', [$marquee->id, $menu->id]) }}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Edit">
														<i class="fa fa-pencil"></i>
													</a>

													<a href="{{ route('marquee.menu.destroy', [$marquee->id, $menu->id]) }}" data-toggle="tooltip" title="" class="btn btn-danger confirm-delete" data-original-title="Delete">
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