@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit reservation
    </h1>
    <a href="{!!url('reservation')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Reservation Index</a>
    <br>
    <form method = 'POST' action = '{!! url("reservation")!!}/{!!$reservation->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="date">date</label>
            <input id="date" name = "date" type="text" class="form-control" value="{!!$reservation->
            date!!}"> 
        </div>
        <div class="form-group">
            <label>jobs Select</label>
            <select name = 'job_id' class = "form-control">
                @foreach($jobs as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection