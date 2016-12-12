<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Blog;
use Auth;
use Validator;

class BlogController extends Controller
{
  /* 1. This method relates to the "images list" view */
    public function index()
    {
     	$blogs = Blog::paginate(3);
      return view('blog.blog-list')->with('blogs', $blogs);
    }
  /* 2. This method relates to the "add new image" view */
    public function create()
    {
      return view('blog.add-new-blog');
    }

	/* 3. This method relates to the "image detail" view */
    public function show($id)
    {
       $blog = Blog::findOrFail($id);
       return view('blog.blog-detail')->with('blog', $blog);
    }

	/* 4. This method relates to the "edit image" view */
    public function edit($id)
    {
       $blog = Blog::findOrFail($id);
       return view('blog.edit-blog')->with('blog', $blog);
    }

    public function store(Request $request)
    {
      // Validation //
      $validation = Validator::make($request->all(), [
         'title'     => 'required|regex:/^[A-Za-z ]+$/',
         'description' => 'required'
      ]);

      // Check if it fails //
      if( $validation->fails()){
         return redirect()->back()->withInput()
                          ->with('errors', $validation->errors() );
      }
      $blog               = new Blog;
      $blog->title        = $request->input('title');
      $blog->description  = $request->input('description');
      $blog->userId       = Auth::User()->id;
      $blog->save();

      return redirect('/blogs')->with('message','You just added a blog!');
    }


   public function update(Request $request, $id)
   {
      // Validation //
      $validation = Validator::make($request->all(), ['title' => 'required|regex:/^[A-Za-z ]+$/','description' => 'required']);
      // Check if it fails //
      if( $validation->fails() ){
        return redirect()->back()->withInput()
                         ->with('errors', $validation->errors() );
      }
      $userId = Auth::User()->id;
      // Process valid data & go to success page //
      $blog = Blog::find($id);

	    // replace old data with new data from the submitted form //
      $blog->title = $request->input('title');
      $blog->description = $request->input('description');
      $blog->userId = $userId;
      $blog->save();

      return redirect('/blogs')->with('message','You just updated a blog!');
   }

   public function destroy($id)
   {
      $blog = Blog::find($id);
      $blog->delete();
      return redirect('/blogs')->with('message','You just deleted a blog!');
   }

}
