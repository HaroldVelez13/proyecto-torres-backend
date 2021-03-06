@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit tool
    </h1>
    <a href="{!!url('tool')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Tool Index</a>
    <br>
    <form method = 'POST' action = '{!! url("tool")!!}/{!!$tool->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="barcode">barcode</label>
            <input id="barcode" name = "barcode" type="text" class="form-control" value="{!!$tool->
            barcode!!}"> 
        </div>
        <div class="form-group">
            <label for="state">state</label>
            <input id="state" name = "state" type="text" class="form-control" value="{!!$tool->
            state!!}"> 
        </div>
        <div class="form-group">
            <label>tool_categories Select</label>
            <select name = 'tool_category_id' class = "form-control">
                @foreach($tool_categories as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection