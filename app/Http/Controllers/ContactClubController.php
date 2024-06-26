<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactClub;

class ContactClubController extends Controller
{
    public function clubContactUs()
    {
        $clubContactInfo = ContactClub::first();
        return view('contact-club', compact('clubContactInfo'));
    }

    public function clubContactUsStore(Request $request) 
    {
           ContactClub::create($request->all());
           return redirect()->route('club.contact.us')->with('success', 'Club info added successfully');
    }
}
