@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create restore
    </h1>
    <a href="{!!url('restore')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Restore Index</a>
    <br>
    <form method = 'POST' action = '{!!url("restore")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="date">date</label>
            <input id="date" name = "date" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>reservations Select</label>
            <select name = 'reservation_id' class = 'form-control'>
                @foreach($reservations as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection