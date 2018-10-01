@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit job
    </h1>
    <a href="{!!url('job')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Job Index</a>
    <br>
    <form method = 'POST' action = '{!! url("job")!!}/{!!$job->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="business_person">business_person</label>
            <input id="business_person" name = "business_person" type="text" class="form-control" value="{!!$job->
            business_person!!}"> 
        </div>
        <div class="form-group">
            <label for="principal_phone">principal_phone</label>
            <input id="principal_phone" name = "principal_phone" type="text" class="form-control" value="{!!$job->
            principal_phone!!}"> 
        </div>
        <div class="form-group">
            <label for="optional_phone">optional_phone</label>
            <input id="optional_phone" name = "optional_phone" type="text" class="form-control" value="{!!$job->
            optional_phone!!}"> 
        </div>
        <div class="form-group">
            <label for="init_date">init_date</label>
            <input id="init_date" name = "init_date" type="text" class="form-control" value="{!!$job->
            init_date!!}"> 
        </div>
        <div class="form-group">
            <label for="finish_date">finish_date</label>
            <input id="finish_date" name = "finish_date" type="text" class="form-control" value="{!!$job->
            finish_date!!}"> 
        </div>
        <div class="form-group">
            <label>cities Select</label>
            <select name = 'city_id' class = "form-control">
                @foreach($cities as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection