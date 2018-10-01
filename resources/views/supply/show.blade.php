@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show supply
    </h1>
    <br>
    <a href='{!!url("supply")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Supply Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>name</b> </td>
                <td>{!!$supply->name!!}</td>
            </tr>
            <tr>
                <td> <b>min_stock</b> </td>
                <td>{!!$supply->min_stock!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection