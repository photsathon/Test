<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // all proflie
    public function index()
    {
        $books = Book::all()->toArray();
        return $books;
    }


    // edit proflie
    public function edit($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    // update proflie
    public function update($id, Request $request)
    {
          $book = Book::find($id);
        $book->firstname=$request->firstname;
        $book->lastname=$request->lastname;
        $book->password=Hash::make($request->password);

        $book->save();
          
         return response()->json(' successfully updated');
        
     }

}