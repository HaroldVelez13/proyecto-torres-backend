@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show unity_supply
    </h1>
    <br>
    <a href='{!!url("unity_supply")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Unity_supply Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>name</b> </td>
                <td>{!!$unity_supply->name!!}</td>
            </tr>
            <tr>
                <td> <b>barcode</b> </td>
                <td>{!!$unity_supply->barcode!!}</td>
            </tr>
            <tr>
                <td> <b>current_amount</b> </td>
                <td>{!!$unity_supply->current_amount!!}</td>
            </tr>
            <tr>
                <td> <b>state</b> </td>
                <td>{!!$unity_supply->state!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>name : </i></b>
                </td>
                <td>{!!$unity_supply->supply->name!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>min_stock : </i></b>
                </td>
                <td>{!!$unity_supply->supply->min_stock!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection