@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Tool_category Index
    </h1>
    <a href='{!!url("tool_category")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>name</th>
            <th>material</th>
            <th>description</th>
            <th>min_stock</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($tool_categories as $tool_category) 
            <tr>
                <td>{!!$tool_category->name!!}</td>
                <td>{!!$tool_category->material!!}</td>
                <td>{!!$tool_category->description!!}</td>
                <td>{!!$tool_category->min_stock!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/tool_category/{!!$tool_category->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/tool_category/{!!$tool_category->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/tool_category/{!!$tool_category->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $tool_categories->render() !!}

</section>
@endsection