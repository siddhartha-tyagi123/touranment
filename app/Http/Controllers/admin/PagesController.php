<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactClub;

class PagesController extends Controller
{
    public function clubContactInfo()
    {
        return view('admin.pages.club-contact-info');
    }

    public function clubContactInfoStore(Request $request)
    {
        // Find the ContactClub record with id 1
        $clubContactInfo = ContactClub::findOrFail(1);

        $clubContactInfo->contect_info = $request->input('contect_info'); 
       
        if ($clubContactInfo->save()) {
            return redirect()->back()->with('success', 'Club contact info updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update club info');
        }
    }

}
