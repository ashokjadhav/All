<div class="col-md-12 comment-container" id="comment-{{$comment->id}}">
  <div class="thumbnail">
    <div class="caption">
      <div class="row text-left" style="padding:1em;">
        <span class="pull-left"><b>{{$comment->user->name}}</b> : </span>
        <span class="pull-left">&nbsp;&nbsp;</span>
        <span class="pull-left" class="comment-text">{{$comment->comment}}</span>
        <a href="{{ url('comment').'/'.$comment->id }}" onclick="return confirm('Are you Sure ?')" data-_method="delete" data-success="remove_div" class="pull-right ajax" title="Delete">
          <i class="fa fa-trash-o fa-1" aria-hidden="true"></i>
        </a>
        <span class="pull-right">&nbsp;&nbsp;</span>
        <a href="{{ url('comment').'/'.$comment->id.'/edit' }}" data-_method="GET"  data-success="show_comment" class="pull-right ajax" title="Edit">
          <i class="fa fa-pencil-square-o fa-1" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>
</div>
