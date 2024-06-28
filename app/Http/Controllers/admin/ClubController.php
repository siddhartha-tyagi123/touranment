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
        $search = $request->query('search');
        $perPage = $request->query('per_page', 10); // Default per page is 10

        $clubsQuery = Club::query();

        // Handle search if there's a search query
        if (!empty($search)) {
            $clubsQuery->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhereHas('country', function($query) use ($search) {
                        $query->where('country_name', 'like', '%' . $search . '%');
                    });
            });
        }

        // Paginate the results
        $clubs = $clubsQuery->paginate($perPage);

        return view('admin.clubs.index', compact('clubs', 'search', 'perPage'));
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
