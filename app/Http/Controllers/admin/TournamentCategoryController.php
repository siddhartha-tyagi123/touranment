<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\TournamentCategory;

class TournamentCategoryController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     
        $tournamentCategories = TournamentCategory::orderBy('created_at', 'DESC')->get();
  
        return view('admin.tournamentCategory.index', compact('tournamentCategories'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tournamentCategory.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TournamentCategory::create($request->all());
 
        return redirect()->route('tournament.category.index')->with('success', 'Tournament category added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tournamentCategory = TournamentCategory::findOrFail($id);
  
        return view('admin.tournamentCategory.edit', compact('tournamentCategory'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tournamentCategory = TournamentCategory::findOrFail($id);
  
        $tournamentCategory->update($request->all());
  
        return redirect()->route('tournament.category.index')->with('success', 'Tournament category updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tournamentCategory = TournamentCategory::findOrFail($id);
  
        $tournamentCategory->delete();
  
        return redirect()->route('tournament.category.index')->with('success', 'Tournament category deleted successfully');
    }
}
