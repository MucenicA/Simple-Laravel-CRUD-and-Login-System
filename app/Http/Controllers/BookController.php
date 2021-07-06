<?php

namespace App\Http\Controllers;

use App\Book;
use Book as GlobalBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Book as ManifestBook;
use phpDocumentor\Reflection\DocBlock\Tags\Book as TagsBook;

class BookController extends Controller
{
    public function index()
    {
     $book = Book::latest()->paginate(10);
     return view('books.index', compact('book'))->
     with('i', (request()->input('page', 1)-1)*10);
    }

    public function getBook(){
        $book = Book::get();
        return $book;

    }
    
    public function create()
    {
        return view('books.create');
    }

   
    public function store(Request $request)
    {

  
        $validatedData = $request->validate([
   
            'name' => 'required|max:255',
    
            'price' => 'required|max:255',
            
            'year'=>'required|max:255',
            ]);

            $book = Book::create($validatedData);

            $book->save();


        return redirect()->route('book.index')-> 
        with('succes', 'Book created successfully');
        
    }

   
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

  
    public function edit(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update();

        return view('books.edit', compact('book'));

       

        
    }

    
    public function update(Request $request, $id)
    {

       
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'year' => 'required|max:255',
         
        ]);
        Book::whereId($id)->update($validatedData);
        return redirect('/book')->with('success', 'Book is successfully updated');
    }


    public function destroy(request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/book')->with('success', 'Book is successfully deleted');
    }
}

