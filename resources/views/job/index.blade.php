@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Job Index
    </h1>
    <a href='{!!url("job")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Associate <span class="caret"></span> </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="http://localhost:8000/city">City</a></li>
        </ul>
    </div>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>business_person</th>
            <th>principal_phone</th>
            <th>optional_phone</th>
            <th>init_date</th>
            <th>finish_date</th>
            <th>name</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($jobs as $job) 
            <tr>
                <td>{!!$job->business_person!!}</td>
                <td>{!!$job->principal_phone!!}</td>
                <td>{!!$job->optional_phone!!}</td>
                <td>{!!$job->init_date!!}</td>
                <td>{!!$job->finish_date!!}</td>
                <td>{!!$job->city->name!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/job/{!!$job->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/job/{!!$job->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/job/{!!$job->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $jobs->render() !!}

</section>
@endsection