@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit slide
    </h1>
    <a href="{!!url('slide')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Slide Index</a>
    <br>
    <form method = 'POST' action = '{!! url("slide")!!}/{!!$slide->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="name">name</label>
            <input id="name" name = "name" type="text" class="form-control" value="{!!$slide->
            name!!}"> 
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input id="description" name = "description" type="text" class="form-control" value="{!!$slide->
            description!!}"> 
        </div>
        <div class="form-group">
            <label for="url_slide">url_slide</label>
            <input id="url_slide" name = "url_slide" type="text" class="form-control" value="{!!$slide->
            url_slide!!}"> 
        </div>
        <div class="form-group">
            <label for="state">state</label>
            <input id="state" name = "state" type="text" class="form-control" value="{!!$slide->
            state!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection