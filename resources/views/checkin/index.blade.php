@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Checkin Index
    </h1>
    <a href='{!!url("checkin")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>date</th>
            <th>url_image</th>
            <th>total</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($checkins as $checkin) 
            <tr>
                <td>{!!$checkin->date!!}</td>
                <td>{!!$checkin->url_image!!}</td>
                <td>{!!$checkin->total!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/checkin/{!!$checkin->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/checkin/{!!$checkin->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/checkin/{!!$checkin->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $checkins->render() !!}

</section>
@endsection