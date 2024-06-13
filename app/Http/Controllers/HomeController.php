<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Tournament;
use App\Models\Country;

class HomeController extends Controller
{
    public function index(Request $request) {
        $ageOptions = Tournament::distinct()->pluck('age')->toArray();
        $dateOptions = Tournament::distinct()->pluck('date')->toArray();
        $organiserOptions = Tournament::distinct()->pluck('organiser')->toArray();
        $countryOptions = Country::whereIn('id', Tournament::distinct()->pluck('country_id'))->pluck('country_name', 'id')->toArray();
        $clubCountryOptions = Country::whereIn('id', Club::distinct()->pluck('country_id'))->pluck('country_name', 'id')->toArray();
    
        $query = Tournament::query();
        $clubQuery = Club::query();
    
        // Apply filters if present
        if ($request->filled('age_filter')) {
            $query->where('age', $request->input('age_filter'));
        }
    
        if ($request->filled('date_filter')) {
            $query->where('date', $request->input('date_filter'));
        }
    
        if ($request->filled('organiser_filter')) {
            $query->where('organiser', $request->input('organiser_filter'));
        }
    
        if ($request->filled('country_filter')) {
            $query->where('country_id', $request->input('country_filter'));
        }
    
        if ($request->filled('title_filter')) {
            $clubQuery->where('title', 'like', '%' . $request->input('title_filter') . '%');
        }
    
        if ($request->filled('club_country_filter')) {
            $clubQuery->where('country_id', $request->input('club_country_filter'));
        }
    
        $filteredTournaments = $query->get();
        $filteredClubs = $clubQuery->get();
    
        if ($request->ajax()) {
            return response()->json([
                'data' => [
                    'tournaments' => $filteredTournaments,
                    'clubs' => $filteredClubs,
                ]
            ]);
        }
    
        // For non-AJAX requests, return the view with data
        return view('home', [
            'data' => [
                'tournaments' => $filteredTournaments,
                'clubs' => $filteredClubs,
            ],
            'ageOptions' => $ageOptions,
            'dateOptions' => $dateOptions,
            'organiserOptions' => $organiserOptions,
            'countryOptions' => $countryOptions,
            'clubCountryOptions' => $clubCountryOptions,
        ]);
    }
    
    public function tournamentProfile($id)
    {
        // Fetch the tournament by id
        $tournament = Tournament::findOrFail($id);

        // Pass the tournament to the view
        return view('tournament-profile', ['tournament' => $tournament]);
    }
    
    public function clubProfile($id)
    {
        // Fetch the tournament by id
        $club = Club::findOrFail($id);

        // Pass the tournament to the view
        return view('club-profile', ['club' => $club]);
    }
    

}
