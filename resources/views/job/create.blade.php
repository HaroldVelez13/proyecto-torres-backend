@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create job
    </h1>
    <a href="{!!url('job')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Job Index</a>
    <br>
    <form method = 'POST' action = '{!!url("job")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="business_person">business_person</label>
            <input id="business_person" name = "business_person" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="principal_phone">principal_phone</label>
            <input id="principal_phone" name = "principal_phone" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="optional_phone">optional_phone</label>
            <input id="optional_phone" name = "optional_phone" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="init_date">init_date</label>
            <input id="init_date" name = "init_date" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="finish_date">finish_date</label>
            <input id="finish_date" name = "finish_date" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>cities Select</label>
            <select name = 'city_id' class = 'form-control'>
                @foreach($cities as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection