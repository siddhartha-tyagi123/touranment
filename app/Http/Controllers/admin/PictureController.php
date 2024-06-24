<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Picture;

class PictureController extends Controller
{
    public function index()
     {
        $pictures = Picture::orderBy('created_at', 'DESC')->get();

        return view('admin.pictures.index', compact('pictures'));
     }

    public function create()
    {
         return view('admin.pictures.create');
    }


    public function store(Request $request)
    {
          $picture = new Picture();
          $picture->title = $request->title;
          $picture->description = $request->description;
        if ($request->hasFile('images')) {
            $imagePaths = [];
    
            foreach ($request->file('images') as $images) {
                $imagePath = $images->store('images', 'public');
                $imagePaths[] = $imagePath;
            }
            $picture->images = implode(',', $imagePaths); 
        }
        $picture->save();
    
        return redirect()->route('pictures.index')->with('success', 'Picture uploaded successfully');
    }


    public function edit(string $id)
    {
      $pictures = Picture::findOrFail($id);
  
        return view('admin.pictures.edit', compact('pictures'));
    }

    
    

    public function update(Request $request, string $id)
    {
        $picture = Picture::findOrFail($id);
        $picture->title = $request->title;
        $picture->description = $request->description;
        // Check if there are files (images) in the request
        if ($request->hasFile('images')) {
            $imagePaths = [];
    
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images', 'public');
                $imagePaths[] = $imagePath;
            }
    
            // Update images attribute of the $picture model
            $picture->images = implode(',', $imagePaths);
        }
    
        // Save other attributes if needed
        // Assuming there are other fields to update, you should handle them here
    
        $picture->save();
    
        return redirect()->route('pictures.index')->with('success', 'Picture updated successfully');
    }
    



    public function destroy(string $id)
    {
        $picture = Picture::findOrFail($id);
  
        $picture->delete();
  
        return redirect()->route('pictures.index')->with('success', 'Picture deleted successfully');
    }

}