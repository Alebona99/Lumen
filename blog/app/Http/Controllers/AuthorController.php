<?php

namespace App\Http\Controllers;
use App\Models\Author;
use illuminate\Http\Request;

class AuthorController extends Controller
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

    //function to show all author
    public function showAllAuthor(){
        $author = Author::all();
        return response()->json($author);
    }

    //function to show one author
    public function showOneAuthor($author_id){
        $author = Author::find($author_id);
        return response()->json($author);
    
    }

    //function for add record in table author
    public function create(Request $request){
        
        //validate request
        
        $this->validate($request,[
            'nome'=> 'required',
            'cognome'=>'required',
            'email'=>'required'
        ]);
        
        //add record in database
       
        $author = Author::create($request->all());
        return response()->json($author, 201);
    }

    //function for update record in table author
    public function update($author_id, Request $request){
        
        //validate request
         $this->validate($request,[
            'nome'=> 'required',
            'cognome'=>'required',
            'email'=>'required'
        ]);

        //update record in database
        $author = Author::findOrFail($author_id);
        $author->update($request->all());
        return response()->json($author, 200);
    }

    //function for delete one record on table author
    public function delete($author_id){
        Author::findOrFail($author_id)->delete();
        return response()->json("Delete Successfully", 200);
    }
}