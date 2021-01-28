<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use illuminate\Http\Request;

class CommentController extends Controller
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

    //function to show all comment
    public function showAllComment(){
        $comment = Comment::all();
        return response()->json($comment);
    }

    //function to show one comment
    public function showOneComment($comment_id){
        $comment = Comment::find($comment_id);
        return response()->json($comment);
    
    }

    //function for add record in table comment
    public function create(Request $request){
        
        //validate request
        
        $this->validate($request,[
            'descr_comment'=> 'required',
            'author_comment'=>'required',
            'post_ref'=> 'required'
        ]);
        
        //add record in database
       
        $comment = Comment::create($request->all());
        return response()->json($comment, 201);
    }

    //function for update record in table comment
    public function update($comment_id, Request $request){
        
        //validate request
         $this->validate($request,[
            'descr_comment'=> 'required',
            'author_comment'=>'required',
            'post_ref'=>'required'
        ]);

        //update record in database
        $comment = Comment::findOrFail($comment_id);
        $comment->update($request->all());
        return response()->json($comment, 200);
    }

    //function for delete one record on table comment
    public function delete($comment_id){
        Comment::findOrFail($comment_id)->delete();
        return response()->json("Delete Successfully", 200);
    }
}