<?php

namespace App\Http\Controllers;

use App\Publisher;
use Publisher as GlobalPublisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Publisher as ManifestPublisher;
use phpDocumentor\Reflection\DocBlock\Tags\Publisher as TagsPublisher;


class PublisherController extends Controller
{
    
    public function index()
    {
     $publisher = Publisher::latest()->paginate(10);
     return view('publishers.index', compact('publisher'))->
     with('i', (request()->input('page', 1)-1)*10);
    }

    public function getPublisher(){
        $publisher = Publisher::get();
        return $publisher;

    }
    
    public function create()
    {
        return view('publishers.create');
    }

   
    public function store(Request $request)
    {
 
 
        $validatedData = $request->validate([
   
            'name' => 'required|max:255',]);

            $publisher = Publisher::create($validatedData);

            $publisher->save();


        return redirect()->route('publisher.index')-> 
        with('succes', 'Publisher created successfully');
    }

   
    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

  
    public function edit($id)
    {
  

        $publisher = Publisher::findOrFail($id);

        return view('publishers.edit', compact('publisher'));
    }

    
    public function update(Request $request, $id)
    {

       
        $validatedData = $request->validate([
            'name' => 'required|max:255',
           
         
        ]);
        Publisher::whereId($id)->update($validatedData);

        return redirect('/publisher')->with('success', 'Publisher is successfully updated');
    }


    public function destroy(request $request, $id)
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        return redirect('/publisher')->with('success', 'Publisher is successfully deleted');
    }
}

