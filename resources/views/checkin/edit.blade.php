@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit checkin
    </h1>
    <a href="{!!url('checkin')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Checkin Index</a>
    <br>
    <form method = 'POST' action = '{!! url("checkin")!!}/{!!$checkin->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="date">date</label>
            <input id="date" name = "date" type="text" class="form-control" value="{!!$checkin->
            date!!}"> 
        </div>
        <div class="form-group">
            <label for="url_image">url_image</label>
            <input id="url_image" name = "url_image" type="text" class="form-control" value="{!!$checkin->
            url_image!!}"> 
        </div>
        <div class="form-group">
            <label for="total">total</label>
            <input id="total" name = "total" type="text" class="form-control" value="{!!$checkin->
            total!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection