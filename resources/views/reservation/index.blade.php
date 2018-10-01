@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Reservation Index
    </h1>
    <a href='{!!url("reservation")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> New</a>
    <br>
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Associate <span class="caret"></span> </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="http://127.0.0.1:8000/job">Job</a></li>
        </ul>
    </div>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>date</th>
            <th>business_person</th>
            <th>principal_phone</th>
            <th>optional_phone</th>
            <th>init_date</th>
            <th>finish_date</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($reservations as $reservation) 
            <tr>
                <td>{!!$reservation->date!!}</td>
                <td>{!!$reservation->job->business_person!!}</td>
                <td>{!!$reservation->job->principal_phone!!}</td>
                <td>{!!$reservation->job->optional_phone!!}</td>
                <td>{!!$reservation->job->init_date!!}</td>
                <td>{!!$reservation->job->finish_date!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/reservation/{!!$reservation->id!!}/deleteMsg" ><i class = 'fa fa-trash'> delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/reservation/{!!$reservation->id!!}/edit'><i class = 'fa fa-edit'> edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/reservation/{!!$reservation->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $reservations->render() !!}

</section>
@endsection