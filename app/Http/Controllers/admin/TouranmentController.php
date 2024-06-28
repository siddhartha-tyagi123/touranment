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
    
        $search = $request->query('search');
        $perPage = $request->query('per_page', 10); // Default per page is 10

        $tournamentQuery = Tournament::query();

        // Handle search if there's a search query
        if (!empty($search)) {
            $tournamentQuery->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('organiser', 'like', '%' . $search . '%')
                    ->orWhere('age', 'like', '%' . $search . '%')
                    ->orWhere('date', 'like', '%' . $search . '%')
                    ->orWhere('city', 'like', '%' . $search . '%')
                    ->orWhere('playing_time', 'like', '%' . $search . '%')
                    ->orWhere('number_of_players', 'like', '%' . $search . '%')
                    ->orWhere('play_field', 'like', '%' . $search . '%')
                    ->orWhereHas('country', function($query) use ($search) {
                        $query->where('country_name', 'like', '%' . $search . '%');
                    });
            });
        }

        // Paginate the results
        $touranments = $tournamentQuery->paginate($perPage);

        return view('admin.touranments.index', compact('touranments', 'search', 'perPage'));
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
    // public function store(Request $request)
    // {
    //     Tournament::create($request->all());
 
    //     return redirect()->route('touranments.index')->with('success', 'Touranment added successfully');
    // }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'organiser' => 'required|max:255',
            'age' => 'required|integer',
            'date' => 'required|date',
            'city' => 'required|max:255',
            'playing_time' => 'required|max:255',
            'number_of_players' => 'required|integer',
            'play_field' => 'required|max:255',
            'country_id' => 'required|exists:countries,id',
            // Add more validation rules as needed for your fields
        ]);

        // Create a new Tournament using the validated data
        Tournament::create($validatedData);

        // Redirect back to index page with a success message
        return redirect()->route('touranments.index')->with('success', 'Tournament added successfully');
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
