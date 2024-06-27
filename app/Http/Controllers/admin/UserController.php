<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;

class UserController extends Controller
{
    
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     
        $users = User::where('type', '!=', 1)
             ->orderBy('created_at', 'ASC')
             ->get();
  
        return view('admin.users.index', compact('users'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.users.create', compact('countries'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create($request->all());
 
        return redirect()->route('users.index')->with('success', 'User added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $selectedCountryId = $user->country_id; 
    
        $countries = Country::all();
  
        return view('admin.users.edit', compact('user','selectedCountryId','countries'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
  
        $user->update($request->all());
  
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
  
        $user->delete();
  
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
