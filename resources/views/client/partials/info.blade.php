@extends('layouts.block', ["b_options" => 'ft'])

@section('b-title')
   <h2> <i class="fa fa-file-o"></i> <strong>{{ $client->name }}</strong> Info</h2>
@overwrite

@section('b-content')
    @parent
    <table class="table table-borderless table-striped">
        <tbody>
        <tr>
            <td style="width: 20%;"><strong>Email</strong></td>
            <td>{{ $client->email  }}</td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td> {{ $client->address}} </td>
        </tr>
        <tr>
            <td><strong>Contact</strong></td>
            <td> {{ $client->phone_no ?? "Null" }} </td>
        </tr>
        
        <tr>
            <td><strong>Registered Date</strong></td>
            <td> {{ $client->created_at  }} </td>
        </tr>
        <tr>
            <td><strong>Last Update</strong></td>
            <td> {{ $client->updated_at  }} </td>
        </tr>
        
        </tbody>
    </table>

@overwrite
