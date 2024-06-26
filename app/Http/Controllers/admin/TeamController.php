<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\TournamentCategory;
use App\Models\Country;
use App\Mail\TeamUpdated;
use Illuminate\Support\Facades\Mail;

class TeamController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     
        $teams = Team::orderBy('created_at', 'DESC')->get();
  
        return view('admin.teams.index', compact('teams'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $tournaments = Tournament::orderBy('created_at', 'ASC')->get();
        $tournamentCategories = TournamentCategory::orderBy('created_at', 'ASC')->get();
        return view('admin.teams.create', compact('countries','tournaments','tournamentCategories'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Team::create($request->all());
 
        return redirect()->route('teams.index')->with('success', 'Team added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = Team::findOrFail($id);
        $selectedCountryId = $team->country_id;
        $selectedTournamentId = $team->tournament_id;  
        $selectedTournamentCategoryId = $team->category_id; 
    
        $countries = Country::all();
        $tournaments = Tournament::all();
        $tournamentCategories = TournamentCategory::all();
  
        return view('admin.teams.edit', compact('team','selectedCountryId','countries','selectedTournamentId','tournaments',
    'selectedTournamentCategoryId', 'tournamentCategories'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail($id);

        // Store the old status for comparison
        $oldStatus = $team->status;

        // Update the team with the new request data
        $team->update($request->all());

        // Check if the status has changed
        if ($team->status !== $oldStatus && $team->status === 'accepted') {
            // Send email notification only if status is updated
            Mail::to($team->email)->send(new TeamUpdated($team));
        }

        return redirect()->route('teams.index')->with('success', 'Team updated successfully');
    }

  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $club = Team::findOrFail($id);
  
        $club->delete();
  
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully');
    }
}
