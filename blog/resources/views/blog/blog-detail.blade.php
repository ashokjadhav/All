@extends('layouts.app')
<style type="text/css">
.fa{
  cursor: pointer;
}
</style>
@section('content')
<div class="container">
  <div class="col-md-12">
    <div class="thumbnail">
      <div class="caption">
        <h3>{{$blog->title}}</h3>
        <p>{{$blog->description}}</p>
      </div>
      <div class="thumbnail">
        <div class="caption comment-list">
          @if(count($blog->comments) > 0)
            <h4 id="count">Comments ({{count($blog->comments)}})</h4>
          @endif
          <div id="comments-container">
            @each('partials._comment', $blog->comments, 'comment','partials._empty')
          </div>
          @include('include.error-notification')
          <form method="POST" action="{{ url('blogs/'.$blog->id.'/comment') }}" class="add-comment ajax" data-success="add_new_div">
            <div class="form-group">
              <textarea class="form-control" name="comment"></textarea>
              <button type="submit" class="btn pull-right btn-primary">Add new comment</button>
            </div>
          </form>
        </div>
      </div>
      <a href="{{ url('/blogs') }}" class="btn btn-warning">Back</a>
    </div>
  </div>
</div>
@stop

@section('page-js')
<script type="text/javascript">
  function remove_div(response, element){
    $(".alert-danger").remove();
    $(".edit-comment").hide();
    if(response.status){
      element.closest('.comment-container').remove();
      update_count();
      return false;
    }else{
      error(response.data);
    }
  }

  function add_new_div(response, element){
    $(".alert-danger").remove();
    $(".edit-comment").hide();
    if(response.status){
      $('#comments-container').append(response.data);
      element.find('textarea').val('');
      update_count();
      return false;
    }else{
      error(response.data);
    }
  }

  function show_comment(response, element){
    $(".alert-danger").remove();
    $(".edit-comment").hide();
    if(response.status){
      $("#comment-" + response.comment_id).after(response.data);
      $(".add-comment").hide();
    }else{
      error(response.data);
    }
  }

  function cancel(){
    $(".edit-comment").hide();
    $(".add-comment").show();
  }

  function update_div(response, element){
    if(response.status){
      $(".edit-comment").remove();
      $("#comment-" + response.comment_id).replaceWith(response.data);
      $(".add-comment").show();
    }else{
      error(response.data);
    }
  }

  function update_count(){
    var length = $('#comments-container').children('.comment-container').length;
    return $('#count').html( length > 0 ? 'Comments ('+ length +')' :'No comments yet, add a new one?') ;
  }

  function error(html){
      $(".comment-list").parent().before(html);
  }
  /*var body = $('body');
  body.on('click','.comment-edit',function(){
    var element = $(this);
    var id = element.data('cid');
    element.closest('.comment-container').hide();
    html = '<form method="POST" action="comment/' + id + '/edit" class="edit-comment ajax" data-success="update_div"><div class="form-group"><textarea class="form-control" name="comment"></textarea><button type="submit" class="btn pull-right btn-primary">Update comment</button><button type="submit" class="btn pull-right btn-primary">Update comment</button></div></form>';
    $('.add-comment').hide();
    element.closest('.comment-container').after(html);
  });*/

</script>
@stop
