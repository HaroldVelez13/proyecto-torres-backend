@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show pension
    </h1>
    <br>
    <a href='{!!url("pension")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Pension Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>name</b> </td>
                <td>{!!$pension->name!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection