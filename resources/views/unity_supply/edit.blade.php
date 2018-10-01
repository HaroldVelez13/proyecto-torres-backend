@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit unity_supply
    </h1>
    <a href="{!!url('unity_supply')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Unity_supply Index</a>
    <br>
    <form method = 'POST' action = '{!! url("unity_supply")!!}/{!!$unity_supply->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="name">name</label>
            <input id="name" name = "name" type="text" class="form-control" value="{!!$unity_supply->
            name!!}"> 
        </div>
        <div class="form-group">
            <label for="barcode">barcode</label>
            <input id="barcode" name = "barcode" type="text" class="form-control" value="{!!$unity_supply->
            barcode!!}"> 
        </div>
        <div class="form-group">
            <label for="current_amount">current_amount</label>
            <input id="current_amount" name = "current_amount" type="text" class="form-control" value="{!!$unity_supply->
            current_amount!!}"> 
        </div>
        <div class="form-group">
            <label for="state">state</label>
            <input id="state" name = "state" type="text" class="form-control" value="{!!$unity_supply->
            state!!}"> 
        </div>
        <div class="form-group">
            <label>supplies Select</label>
            <select name = 'supply_id' class = "form-control">
                @foreach($supplies as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
        </div>
        <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Update</button>
    </form>
</section>
@endsection