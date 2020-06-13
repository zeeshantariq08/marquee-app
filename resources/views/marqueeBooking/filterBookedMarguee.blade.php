@extends('layouts.app')

@section('title', $pageTitle)
@section('titleicon', 'fa fa-building')

@section('content')

    <div class="row">
        <div class="col-12">
        	<!-- Block with Options -->
			<div class="block full">
			    <!-- Block with Options Title -->
			    <div class="block-title">
			    	<h2> <i class="fa fa-building"></i> <strong> {{$pageTitle ?? ''}} </strong> </h2>
			        {{-- <div class="block-options pull-right">
	                    <a href="" class="btn btn-alt btn-sm btn-primary" title="Add New City"><i class="fa fa-plus"></i> Add </a>
			        </div> --}}
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
								        <th>email</th>
								        <th>Date</th>
								        <th>Status</th>

								        <th class="text-center">Action</th>
								    </tr>
			                    </thead>
			                    <tbody>
			                    	@forelse ($bookedMarquees as $booked)
				                    	<tr>
							                <td class="text-center"> {{ $booked->id }} </td>
							                <td> {{ $booked->name }} </td>
							                <td> {{ $booked->email }} </td>
							                <td> {{ $booked->reserve_date->format('d-m-Y') }} </td>

							                <td class="text-center">
							                    <div class="btn-group">
													<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-alt btn-{{$booked->button_color}} dropdown-toggle" aria-expanded="false">{{$booked->status}} <span class="caret"></span></a>

													<ul class="dropdown-menu dropdown-custom text-left">
														<li class="divider"></li>
														<li>

														<a href="{{route('booking.marqueeStatus',['id' => $booked->id , 'status' => 'pending'])}}" class="confirm-status"><i class="fa fa-clock-o pull-right"></i>Pending</a>
														
														</li>
														<li class="divider"></li>
														<li>
														<a href="{{route('booking.marqueeStatus',['id' => $booked->id , 'status' => 'approved'])}}" class="confirm-status"><i class="fa fa-check pull-right"></i>Approved</a>
														</li>
														<li class="divider"></li>
														<li>
														<a href="{{route('booking.marqueeStatus',['id' => $booked->id , 'status' => 'cancel'])}}" class="confirm-status"><i class="fa fa-times pull-right"></i>Cancle</a>
														</li>
													</ul>
												</div>
							                </td>


							                <td class="text-center">
												<div class="btn-group-sm">

													<a href="{{ route('booking.destroy', $booked->id) }}" data-toggle="tooltip" title="" class="btn btn-danger confirm-delete" data-original-title="Delete">
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

        <form method="post" id="status-form"> 
            @method('PUT')
            @csrf

        </form>
                       

    </div>
@endsection


