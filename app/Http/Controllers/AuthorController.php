<?php

namespace App\Http\Controllers;

use App\Author;
use Author as GlobalAuthor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Author as ManifestAuthor;
use phpDocumentor\Reflection\DocBlock\Tags\Author as TagsAuthor;


class AuthorController extends Controller
{

  
   
    
    public function index()
    {
     $author = Author::latest()->paginate(10);
     return view('users.index', compact('author'))->
     with('i', (request()->input('page', 1)-1)*10);
    }

    public function getAuthor(){
        $author = Author::get();
        return $author;

    }
    
    public function create()
    {
        return view('users.create');
    }

   
    public function store(Request $request)
    {
             $validatedData = $request->validate([
   
            'name' => 'required|max:255',
    
            'job' => 'required|max:255',
            
            ]);

            $author = Author::create($validatedData);

            $author->save();


        return redirect()->route('author.index')-> 
        with('succes', 'Author created successfully');
    }

   
    public function show(author $author)
    {
        return view('users.show', compact('author'));
    }

  
    public function edit(Request $request ,$id)
    {
        $author = Author::findOrFail($id);
        $author->update();

        return view('users.edit', compact('author'));
        

      // $author = Author::findOrFail($id);

       // return view('users.edit', compact('author'));
    }

    
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'job' => 'required|max:255',
         
        ]);
        Author::whereId($id)->update($validatedData);

        return redirect('/author')->with('success', 'Author is successfully updated');
    }


    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect('/author')->with('success', 'Author is successfully deleted');
    }
}

