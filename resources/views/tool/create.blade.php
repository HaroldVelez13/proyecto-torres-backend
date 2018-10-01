@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create tool
    </h1>
    <a href="{!!url('tool')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Tool Index</a>
    <br>
    <form method = 'POST' action = '{!!url("tool")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="barcode">barcode</label>
            <input id="barcode" name = "barcode" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="state">state</label>
            <input id="state" name = "state" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>tool_categories Select</label>
            <select name = 'tool_category_id' class = 'form-control'>
                @foreach($tool_categories as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection