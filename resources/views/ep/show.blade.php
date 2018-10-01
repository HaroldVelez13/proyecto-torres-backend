@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show ep
    </h1>
    <br>
    <a href='{!!url("ep")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Ep Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>name</b> </td>
                <td>{!!$ep->name!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection