@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Tool Index
    </h1>
    <a href='{!!url("tool")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Associate <span class="caret"></span> </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="http://localhost:8000/tool_category">Tool_category</a></li>
        </ul>
    </div>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>barcode</th>
            <th>state</th>
            <th>name</th>
            <th>material</th>
            <th>description</th>
            <th>min_stock</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($tools as $tool) 
            <tr>
                <td>{!!$tool->barcode!!}</td>
                <td>{!!$tool->state!!}</td>
                <td>{!!$tool->tool_category->name!!}</td>
                <td>{!!$tool->tool_category->material!!}</td>
                <td>{!!$tool->tool_category->description!!}</td>
                <td>{!!$tool->tool_category->min_stock!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/tool/{!!$tool->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/tool/{!!$tool->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/tool/{!!$tool->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $tools->render() !!}

</section>
@endsection