@extends('layouts.block' , [ 'b_type' => 'table', "b_options" => 'ft'])

@section('b-title')
    <h2> <i class="fa fa-server"></i> <strong> Services </strong></h2>
@overwrite
@section('b-subtitle')
    List
@overwrite

@section('b-options')
    <a href="{{ route('addservice',$id) }}" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Services Info"><i class="fa fa-plus"></i></a>
@overwrite

@section('b-thead')
    <tr>
        <th class="text-center">ID</th>
        <th>Marquee Name</th>
        <th>Service</th>

        <th class="text-center">Actions</th>
    </tr>
@endsection

@section('b-tbody')
    @foreach ($services as $row)
        <tr>
            <td class="text-center">
                {{ $row->id }}
            </td>
            <td class="text-center">
                {{ $row->getMarquee->name }}
            </td >
            <td class="text-center">
                {{ $row->name }}
            </td>
            
            <td class="text-center">
                <div class="btn-group">
                    <a href="{{ route('marquees.show', $row->slug) }}" data-toggle="tooltip" title="View" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('marquees.edit',$row->slug) }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>

                </div>
            </td>
        </tr>
    @endforeach

@endsection
