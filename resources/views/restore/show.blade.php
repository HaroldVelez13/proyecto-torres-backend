@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show restore
    </h1>
    <br>
    <a href='{!!url("restore")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Restore Index</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td> <b>date</b> </td>
                <td>{!!$restore->date!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>date : </i></b>
                </td>
                <td>{!!$restore->reservation->date!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection