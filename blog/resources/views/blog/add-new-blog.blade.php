@extends('layouts.app')

@section('content')
<div class="container">
   @include('include.error-notification')
   {!! Form::open(['url'=>'/blogs', 'method'=>'POST', 'files'=>'true']) !!}

      <div class="form-group">
         <label for="caption">Title</label>
         <input type="text" class="form-control" name="title" value="">
      </div>

      <div class="form-group">
         <label for="description">Description</label>
         <textarea class="form-control" name="description"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
      <a href="{{ url('/blogs') }}" class="btn btn-warning">Cancel</a>

   {!! Form::close() !!}
</div>
@stop
