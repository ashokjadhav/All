<form method="PUT" action="{{ url('comment/'.$comment->id) }}" class="edit-comment ajax" data-success="update_div">
  <div class="form-group">
    <textarea class="form-control" id="comment" name="comment">{{$comment->comment}}</textarea>
    <a href="javascript:void(0)" class="btn pull-right btn-warning" onclick="return cancel();">Cancel</a>
    <button type="submit" class="btn pull-right btn-primary">Update</button>
  </div>
</form>
