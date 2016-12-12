@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      @if(count($blogs) > 0)
         <div class="col-md-12 text-center" >
            <a href="{{ url('/blogs/create') }}" class="btn btn-primary" role="button">
               Add New blog
            </a>
            <hr />
            @include('include.error-notification')
         </div>
      @endif
      @forelse($blogs as $blog)
         <div class="col-md-12">
            <div class="thumbnail">
               <div class="caption">
                  <h3>{{$blog->title}}</h3>
                  <p>{!! substr($blog->description, 0,300) !!}...</p>
                  <p>
                     <div class="row text-center" style="padding:1em;">
                        <a href="{{ url('/blogs/'.$blog->id.'/edit') }}" class="btn btn-warning pull-left">Edit</a>
                        <span class="pull-left">&nbsp;</span>
                        <a href="{{ url('/blogs/'.$blog->id) }}" class="btn btn-info pull-left">View</a>
                        <span class="pull-left">&nbsp;</span>
                        {!! Form::open(['url'=>'/blogs/'.$blog->id, 'class'=>'pull-left']) !!}
                           {!! Form::hidden('_method', 'DELETE') !!}
                           {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>'return confirm(\'Are you sure?\')']) !!}
                        {!! Form::close() !!}
                        <span class="pull-right">- <b>{{$blog->user->name}}</b></span>
                     </div>
                  </p>
               </div>
            </div>
         </div>
      @empty
         <p>No blogs yet, <a href="{{ url('/blogs/create') }}">add a new one</a>?</p>
      @endforelse
   </div>
   <div align="center">{!! $blogs->render() !!}</div>
</div>
@stop