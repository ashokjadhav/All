<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comment;
use App\Blog;
use Auth;
use DB;
use Validator;
use View;

class CommentsController extends Controller
{
    public function store(Request $request,Blog $blog)
    {
    	// Validation //
      $validation = Validator::make($request->all(), ['comment'     => 'required']);
      // Check if it fails //
      if( $validation->fails()){
        $return = View::make('partials._error',['custom_errors' => $validation->errors()]);
        $contents = $return->render();
        return $response = array('status' => false,'data' => $contents);
      }
      $comment = new Comment;
      $comment->comment = $request->input('comment');
      $comment->user_id = Auth::User()->id;
      $comment = $blog->comments()->save($comment);
      $return = View::make('partials._comment',['comment' => $comment]);
      $contents = $return->render();
      return $response = array('status' => true,'data' =>  $contents);
    }

    public function edit($id)
    {
      $comment = Comment::find($id);
      if($comment->user_id != Auth::User()->id){
        $return = View::make('partials._error',['errors' => array('You are not authourized to edit this comment')]);
        $contents = $return->render();
        return $response = array('status' => false,'data' => $contents );
      }
      $return = View::make('partials._comment_edit',['comment' => $comment]);
      $contents = $return->render();
      return $response = array('status' => true,'data' =>  $contents,'comment_id' => $id);
    }

    public function update(Request $request, $id)
   {
      // Validation //
      $validation = Validator::make($request->all(), ['comment' => 'required']);
      // Check if it fails //
      if( $validation->fails()){
        $return = View::make('partials._error',['custom_errors' => $validation->errors()]);
        $contents = $return->render();
        return $response = array('status' => false,'data' => $contents);
      }
      $comment = Comment::find($id);
      // replace old data with new data from the submitted form //
      $comment->comment = $request->input('comment');
      $comment->save();
      $return = View::make('partials._comment',['comment' => $comment]);
      $contents = $return->render();
      return $response = array('status' => true,'data' => $contents,'comment_id' => $id);
    }

    public function destroy($id,Blog $blog)
   {
      $comment = Comment::find($id);
      if($comment->user_id != Auth::User()->id){
        $return = View::make('partials._error',['errors' => array('You are not authourized to delete this comment')]);
        $contents = $return->render();
        return $response = array('status' => false,'data' => $contents );
      }
      $deleteStatus  = $comment->delete();
      if($deleteStatus){
        return $data = array('status' => true, 'id'  => $id);
      }
    }
}
