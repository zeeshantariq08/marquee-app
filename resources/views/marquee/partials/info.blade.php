@extends('layouts.block', ["b_options" => 'ft'])

@section('b-title')
   <h2> <i class="fa fa-building"></i> <strong>{{ $marquee->name }}</strong></h2>
@overwrite

@section('b-content')
    @parent
    <table class="table table-borderless table-striped">
        <tbody>
        <tr>
            <td style="width: 20%;"><strong>City</strong></td>
            <td>{{ $marquee->city->name  }}</td>
        </tr>

        <tr>
            <td style="width: 20%;"><strong>Email</strong></td>
            <td>{{ $marquee->email  }}</td>
        </tr>

        <tr>
            <td><strong>Address</strong></td>
            <td> {{ $marquee->address}} </td>
        </tr>
        <tr>
            <td><strong>Contact</strong></td>
            <td> {{ $marquee->phone_no ?? "Null" }} </td>
        </tr>
        <tr>
            <td><strong>Description</strong></td>
            <td> {{ $marquee->description}} </td>
        </tr>
        
        <tr>
            <td><strong>Registered Date</strong></td>
            <td> {{ $marquee->created_at  }} </td>
        </tr>
        <tr>
            <td><strong>Last Update</strong></td>
            <td> {{ $marquee->updated_at  }} </td>
        </tr>
        
        </tbody>
    </table>

@overwrite
