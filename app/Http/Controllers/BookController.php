<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function test(){
        $Data= Book::all();
        return $Data;
   }
 public function addBook(Request $request){

        $book = new Book();

        $book->book_name=$request->input('book_name');
        $book->author_name=$request->input('author_name');
        $book->book_id=$request->input('book_id');
        $book->price=$request->input('price');
        $book->publication=$request->input('publication');


     $data = $book -> save();
     return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');


 }

    public function updateBook(Request $request){

        $book = Book::find($request->input('id'));

        $book->book_name=$request->input('book_name');
        $book->author_name=$request->input('author_name');
        $book->book_id=$request->input('book_id');
        $book->price=$request->input('price');
        $book->publication=$request->input('publication');


        $data = $book -> save();
        return response(['data' => $data, 'status' => 200, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');


    }



    public function getBook(){
        $data = Book::all();
        return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');
    }

    public function deleteBook($id){
//        dd($id);
        $data = Book::find($id)->delete();
        return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');
    }
}

