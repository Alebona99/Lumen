<?php

namespace App\Http\Controllers;
use App\Models\Post;
use illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //function to show all post
    public function showAllPost(){
        $post = Post::all();
        return response()->json($post);
    }

    //function to show one post
    public function showOnePost($post){
        $post = Post::find($post);
        return response()->json($post);
    
    }

    //function for add record in table post
    public function create(Request $request){
        
        //validate request
        
        $this->validate($request,[
            'descr_post'=> 'required',
            'author_post'=>'required',
        ]);
        
        //add record in database
       
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    //function for update record in table post
    public function update($post_id, Request $request){
        
        //validate request
         $this->validate($request,[
            'descr_post'=> 'required',
            'author_post'=>'required',
        ]);

        //update record in database
        $post = Post::findOrFail($post_id);
        $post->update($request->all());
        return response()->json($post, 200);
    }

    //function for delete one record on table post
    public function delete($post_id){
        Post::findOrFail($post_id)->delete();
        return response()->json("Delete Successfully", 200);
    }
}