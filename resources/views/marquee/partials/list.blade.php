@extends('layouts.block' , [ 'b_type' => 'table', "b_options" => 'ft'])

@section('b-title')
    <h2> <i class="fa fa-building"></i> <strong> Marquee </strong></h2>
@overwrite
@section('b-subtitle')
    List
@overwrite

@section('b-options')
    <a href="{{ route('marquees.create') }}" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Marquee Info"><i class="fa fa-plus"></i></a>
@overwrite

@section('b-thead')
    <tr>
        <th class="text-center">ID</th>
        <th>Name</th>
        <th>Address</th>
        <th class="text-center">Option</th>
        <th class="text-center">Status</th>

        <th class="text-center">Actions</th>
    </tr>
@endsection

@section('b-tbody')
    @foreach ($marquees as $row)
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
            <td>
                <a href="{{ route('services.show', $row->id) }}" class="btn btn-alt btn-xs btn-default">Services</a>
                
                <a href="{{ route('marquee.menu.index', $row->id) }}" class="btn btn-alt btn-xs btn-primary">Menu</a>

                <a href="{{ route('gallerys.show', $row->id) }}" class="btn btn-alt btn-xs btn-info">Gallery</a>
            </td>
            <td class="text-center">
                    <form action="{{ route('marquees.toggleStatus', $row->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label class="switch switch-sm switch-info">
                            <input {{ $row->status ? 'checked' : '' }} onclick="this.form.submit()" type="checkbox">
                            <span {{ $row->status ? 'title=Inactive it' : 'title=Activate it' }} data-toggle="tooltip"></span>
                        </label>
                    </form>
                </td>
            
            <td class="text-center">
                <div class="btn-group">
                    <a href="{{ route('marquees.show', $row->slug) }}" data-toggle="tooltip" title="View" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('marquees.edit',$row->slug) }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>

                </div>
            </td>
        </tr>
    @endforeach
    <!-- gallery model -->
    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> --}}


@endsection
