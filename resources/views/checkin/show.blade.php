@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show checkin
    </h1>
    <br>
    <a href='{!!url("checkin")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Checkin Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>date</b> </td>
                <td>{!!$checkin->date!!}</td>
            </tr>
            <tr>
                <td> <b>url_image</b> </td>
                <td>{!!$checkin->url_image!!}</td>
            </tr>
            <tr>
                <td> <b>total</b> </td>
                <td>{!!$checkin->total!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection