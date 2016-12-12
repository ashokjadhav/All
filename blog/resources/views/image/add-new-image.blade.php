@extends('layouts.app')

@section('content')
<div class="container">
   @include('include.error-notification')
   {!! Form::open(['url'=>'/image', 'method'=>'POST', 'files'=>'true']) !!}
   
      <div class="form-group">
         <label for="userfile">Image File</label>
         <input type="file" class="form-control" name="userfile">
      </div>

      <div class="form-group">
         <label for="caption">Caption</label>
         <input type="text" class="form-control" name="caption" value="">
      </div>

      <div class="form-group">
         <label for="description">Description</label>
         <textarea class="form-control" name="description"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Upload</button>
      <a href="{{ url('/image') }}" class="btn btn-warning">Cancel</a>

   {!! Form::close() !!}
</div>
@stop