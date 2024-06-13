<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Country;
use Datatables;

class ClubController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     
        $clubs = Club::orderBy('created_at', 'DESC')->get();
  
        return view('admin.clubs.index', compact('clubs'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.clubs.create', compact('countries'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Club::create($request->all());
 
        return redirect()->route('clubs.index')->with('success', 'Club added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $club = Club::findOrFail($id);
        $selectedCountryId = $club->country_id; 
    
        $countries = Country::all();
  
        return view('admin.clubs.edit', compact('club','selectedCountryId','countries'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $club = Club::findOrFail($id);
  
        $club->update($request->all());
  
        return redirect()->route('clubs.index')->with('success', 'Club updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $club = Club::findOrFail($id);
  
        $club->delete();
  
        return redirect()->route('clubs.index')->with('success', 'Club deleted successfully');
    }
}
