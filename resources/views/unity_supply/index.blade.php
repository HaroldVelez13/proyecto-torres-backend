@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Unity_supply Index
    </h1>
    <a href='{!!url("unity_supply")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Associate <span class="caret"></span> </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="http://localhost:8000/supply">Supply</a></li>
        </ul>
    </div>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>name</th>
            <th>barcode</th>
            <th>current_amount</th>
            <th>state</th>
            <th>name</th>
            <th>min_stock</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($unity_supplies as $unity_supply) 
            <tr>
                <td>{!!$unity_supply->name!!}</td>
                <td>{!!$unity_supply->barcode!!}</td>
                <td>{!!$unity_supply->current_amount!!}</td>
                <td>{!!$unity_supply->state!!}</td>
                <td>{!!$unity_supply->supply->name!!}</td>
                <td>{!!$unity_supply->supply->min_stock!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/unity_supply/{!!$unity_supply->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/unity_supply/{!!$unity_supply->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/unity_supply/{!!$unity_supply->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $unity_supplies->render() !!}

</section>
@endsection