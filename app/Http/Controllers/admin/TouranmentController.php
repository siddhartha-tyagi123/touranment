<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Country;

class TouranmentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     
        $touranments = Tournament::orderBy('created_at', 'DESC')->get();
  
        return view('admin.touranments.index', compact('touranments'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.touranments.create', compact('countries'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tournament::create($request->all());
 
        return redirect()->route('touranments.index')->with('success', 'Touranment added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tournament = Tournament::findOrFail($id);
        $selectedCountryId = $tournament->country_id; // Assuming you have a 'country_id' column in the 'tournaments' table
    
        // Fetch all countries to populate the dropdownresources\views\admin\touranments
        $countries = Country::all();
    
        return view('admin.touranments.edit', compact('tournament', 'selectedCountryId', 'countries'));
    }
    
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $touranment = Tournament::findOrFail($id);
  
        $touranment->update($request->all());
  
        return redirect()->route('touranments.index')->with('success', 'Touranment updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $touranment = Tournament::findOrFail($id);
  
        $touranment->delete();
  
        return redirect()->route('touranments.index')->with('success', 'Touranment deleted successfully');
    }
    
}
