<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
date_default_timezone_set('Asia/Manila');


class BookController extends Controller
{
    public function list(Request $request){
        return json_encode(Book::all());
    }

    public function items(Request $request){
        return json_encode(Book::find($request->id));
    }

    public function create(Request $request){
        // Validation Rules
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'author' => 'required',
            'year' => 'required',
        ]);

        // Create Data in DB
        $data = new Book();
        $data->name = $request->name;
        $data->type = $request->type;
        $data->author = $request->author;
        $data->year = $request->year;

        // Save to DB
        $data->save();

        // Return
        return json_encode( 
            ['success'=>true]
        );
    } 

    public function update(Request $request){
        // Validation Rules
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'author' => 'required',
            'year' => 'required',
        ]);

        // Update Data in DB
        $data = Book::find($request->id);
        $data->name = $request->name;
        $data->type = $request->type;
        $data->author = $request->author;
        $data->year = $request->year;

        // Save to DB
        $data->save();

        // Return 
        return json_encode(
            ['success'=>true]
        );
    }
    
    public function delete(Request $request){
        $data = Book::find($request->id);
        $data->delete();
        return json_encode( 
            ['success'=>true]
        );
    }
}
