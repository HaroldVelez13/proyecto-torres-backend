@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show tool_category
    </h1>
    <br>
    <a href='{!!url("tool_category")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Tool_category Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>name</b> </td>
                <td>{!!$tool_category->name!!}</td>
            </tr>
            <tr>
                <td> <b>material</b> </td>
                <td>{!!$tool_category->material!!}</td>
            </tr>
            <tr>
                <td> <b>description</b> </td>
                <td>{!!$tool_category->description!!}</td>
            </tr>
            <tr>
                <td> <b>min_stock</b> </td>
                <td>{!!$tool_category->min_stock!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection