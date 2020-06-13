@extends('layouts.block' , [ 'b_type' => 'table', "b_options" => 'ft'])

@section('b-title')
    <h2> <i class="fa fa-users"></i> <strong> Clients </strong></h2>
@overwrite
@section('b-subtitle')
    List
@overwrite

@section('b-options')
    <a href="{{ route('clients.create') }}" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Create Product"><i class="fa fa-plus"></i></a>
@overwrite

@section('b-thead')
    <tr>
        <th class="text-center">ID</th>
        <th>Name</th>
        <th>Address</th>
        <th class="text-center">Email</th>
        <th class="text-center">Phone Number</th>
        <th class="text-center">Actions</th>
    </tr>
@endsection

@section('b-tbody')
    @foreach ($clients as $row)
        <tr>
            <td class="text-center">
                {{ $row->id }}
            </td>
            <td class="text-center">
                {{ $row->name }}
            </td >
            <td class="text-center">
                {{ $row->address }}
            </td>
            <td class="text-center">
                {{ $row->email }}
            </td>
            <td class="text-center">
                {{ $row->phone_no }}
            </td>
            
            <td class="text-center">
                <div class="btn-group">
                    <a href="{{ route('clients.show', $row->slug) }}" data-toggle="tooltip" title="View" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('clients.edit',$row->slug) }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>

                </div>
            </td>
        </tr>
    @endforeach

@endsection
