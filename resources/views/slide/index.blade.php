@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Slide Index
    </h1>
    <a href='{!!url("slide")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>name</th>
            <th>description</th>
            <th>url_slide</th>
            <th>state</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($slides as $slide) 
            <tr>
                <td>{!!$slide->name!!}</td>
                <td>{!!$slide->description!!}</td>
                <td>{!!$slide->url_slide!!}</td>
                <td>{!!$slide->state!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/slide/{!!$slide->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/slide/{!!$slide->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/slide/{!!$slide->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $slides->render() !!}

</section>
@endsection