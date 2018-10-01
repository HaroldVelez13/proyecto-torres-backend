@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show tool
    </h1>
    <br>
    <a href='{!!url("tool")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Tool Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>barcode</b> </td>
                <td>{!!$tool->barcode!!}</td>
            </tr>
            <tr>
                <td> <b>state</b> </td>
                <td>{!!$tool->state!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>name : </i></b>
                </td>
                <td>{!!$tool->tool_category->name!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>material : </i></b>
                </td>
                <td>{!!$tool->tool_category->material!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>description : </i></b>
                </td>
                <td>{!!$tool->tool_category->description!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>min_stock : </i></b>
                </td>
                <td>{!!$tool->tool_category->min_stock!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection