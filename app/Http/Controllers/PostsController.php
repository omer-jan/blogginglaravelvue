<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      //return "i am index";
    return Post::orderBy('id','DESC')->get();
    }
    public function home()
    {
      //return "i am home";
     return view('vueApp');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "i am created";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request,[
        'title'=>'required',
        'body'=>'required'
      ]);


         $post=new Post;
         $post->title=$request->title;
         $post->body=$request->body;
         $post->save();
        return response()->json(['status'=>'success','msg'=>'post created successfully']);
    }

    /**
     *  Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            return Post::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $this->validate($request,[
        'title'=>'required',
        'body'=>'required'
      ]);
      $post=Post::find($id);
      if($post->count())
      {

        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();
        return response()->json(['status'=>'sucess','msg'=>'Post Updated Sucessfully']);
      }
      else {
        return response()->json(['status'=>'error','msg'=>'something goes wrong']);
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    $post =Post::find($id);
      if($post->count())
      {
        $post->delete();
        return response()->json(['status'=>'sucess','msg'=>'Post Deleted Sucessfully']);
      }
      else {

        return response()->json(['status'=>'error','msg'=>'something goes wrong']);
      }

    }
}
