@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show reservation
    </h1>
    <br>
    <a href='{!!url("reservation")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Reservation Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>date</b> </td>
                <td>{!!$reservation->date!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>business_person : </i></b>
                </td>
                <td>{!!$reservation->job->business_person!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>principal_phone : </i></b>
                </td>
                <td>{!!$reservation->job->principal_phone!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>optional_phone : </i></b>
                </td>
                <td>{!!$reservation->job->optional_phone!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>init_date : </i></b>
                </td>
                <td>{!!$reservation->job->init_date!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>finish_date : </i></b>
                </td>
                <td>{!!$reservation->job->finish_date!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection