@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create slide
    </h1>


    <a href="{!!url('slide')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Slide Index</a>
    <br>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method = 'POST' action = '{!!url("slide")!!}' enctype="multipart/form-data">
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="name">name</label>
            <input id="name" name = "name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input id="description" name = "description" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label for="state">state</label>
            <select id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name='state'>
                <option value="active">Activo</option>
                <option value="inactive">Inactivo</option>
            </select>

            @if ($errors->has('state'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('state') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="url_slide">url_slide</label>
            <input id="url_slide" name = "url_slide" type="file" accept="image/*" >
        </div>
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Save</button>
    </form>
</section>
@endsection