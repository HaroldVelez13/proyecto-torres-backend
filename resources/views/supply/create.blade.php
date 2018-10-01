@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create supply
    </h1>
    <a href="{!!url('supply')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Supply Index</a>
    <br>
    <form method = 'POST' action = '{!!url("supply")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="name">name</label>
            <input id="name" name = "name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="min_stock">min_stock</label>
            <input id="min_stock" name = "min_stock" type="text" class="form-control">
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection