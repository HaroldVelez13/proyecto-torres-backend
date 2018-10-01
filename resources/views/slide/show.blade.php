@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show slide
    </h1>
    <br>
    <a href='{!!url("slide")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Slide Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>name</b> </td>
                <td>{!!$slide->name!!}</td>
            </tr>
            <tr>
                <td> <b>description</b> </td>
                <td>{!!$slide->description!!}</td>
            </tr>
            <tr>
                <td> <b>url_slide</b> </td>
                <td>{!!$slide->url_slide!!}</td>
            </tr>
            <tr>
                <td> <b>state</b> </td>
                <td>{!!$slide->state!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection