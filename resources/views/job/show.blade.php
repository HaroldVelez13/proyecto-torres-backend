@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show job
    </h1>
    <br>
    <a href='{!!url("job")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Job Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>business_person</b> </td>
                <td>{!!$job->business_person!!}</td>
            </tr>
            <tr>
                <td> <b>principal_phone</b> </td>
                <td>{!!$job->principal_phone!!}</td>
            </tr>
            <tr>
                <td> <b>optional_phone</b> </td>
                <td>{!!$job->optional_phone!!}</td>
            </tr>
            <tr>
                <td> <b>init_date</b> </td>
                <td>{!!$job->init_date!!}</td>
            </tr>
            <tr>
                <td> <b>finish_date</b> </td>
                <td>{!!$job->finish_date!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>name : </i></b>
                </td>
                <td>{!!$job->city->name!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection