@extends('layouts.app')

@section('content')
<div class="container">
   @include('include.error-notification')
   {!! Form::model($blog,['url' => '/blogs/'.$blog->id, 'method' => 'PUT', 'files'=>true]) !!}
      <div class="form-group">
         <label for="title">Caption</label>
         {!! Form::text('title',null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
         <label for="description">Description</label>
         {!! Form::textarea('description',null,['class'=>'form-control']) !!}
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="{{ url('/blogs') }}" class="btn btn-warning">Cancel</a>

   {!! Form::close() !!}
</div>
@stop
