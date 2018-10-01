@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit tool_category
    </h1>
    <a href="{!!url('tool_category')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Tool_category Index</a>
    <br>
    <form method = 'POST' action = '{!! url("tool_category")!!}/{!!$tool_category->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="name">name</label>
            <input id="name" name = "name" type="text" class="form-control" value="{!!$tool_category->
            name!!}"> 
        </div>
        <div class="form-group">
            <label for="material">material</label>
            <input id="material" name = "material" type="text" class="form-control" value="{!!$tool_category->
            material!!}"> 
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input id="description" name = "description" type="text" class="form-control" value="{!!$tool_category->
            description!!}"> 
        </div>
        <div class="form-group">
            <label for="min_stock">min_stock</label>
            <input id="min_stock" name = "min_stock" type="text" class="form-control" value="{!!$tool_category->
            min_stock!!}"> 
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection