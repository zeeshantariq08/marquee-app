@extends('layouts.app')

@section('title', 'Dashboard')
@section('titleicon', 'fa fa-bar-chart')

@section('content')


    <div class="row text-center">

        <div class="col-sm-6 col-lg-3">
            <a href="{{ route('marquees.index') }}" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
            <h4 class="widget-content-light"><strong>Total</strong> Marquee</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$total_marquees ?? 0}}</span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-3">
            <a href="{{ route('booking.index') }}" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background">
            <h4 class="widget-content-light"><strong>Booked</strong> Marquee</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 animation-expandOpen">{{$booked_marquees->count() ?? 0}}</span></div>
            </a>
        </div>
        
        <div class="col-sm-6 col-lg-3">
            <a href="{{ route('booking.show', 'approved') }}" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-success">
            <h4 class="widget-content-light"><strong>Approved</strong> Request</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen">{{$approved_request ?? 0}}</span></div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-3">
            <a href="{{ route('booking.show', 'pending') }}" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-warning">
            <h4 class="widget-content-light"><strong>Pending</strong> Request</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-warning animation-expandOpen">{{$pending_request ?? 0 }}</span></div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <!-- Block with Options -->
            <div class="block full">
                <!-- Block with Options Title -->
                <div class="block-title">
                    <h2> <i class="fa fa-building"></i> <strong> Booked Marquee </strong> </h2>
                   {{--  <div class="block-options pull-right">
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
                                        <th>Marquee </th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Date</th>
                                        <th> Function Time </th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($booked_marquees as $booked)

                                        <tr>
                                            <td class="text-center"> {{$booked->id}}</td>
                                            <td> {{$booked->marquee->name}}</td>
                                            <td> {{$booked->name}}</td>
                                            <td> {{$booked->email}}</td>
                                            <td> {{$booked->reserve_date->format('d-m-Y')}}</td>
                                            <td> {{$booked->function_time}}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <span  data-toggle="dropdown" class="btn btn-alt btn-{{$booked->button_color}} dropdown-toggle" aria-expanded="false">{{$booked->status}} </span> 
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-danger"> Do Data Found </td>
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
