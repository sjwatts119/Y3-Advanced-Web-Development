<?php

namespace App\Http\Controllers;

use App\Models\ContactDetails;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //return contact view
    public function index()
    {
        return view('contact.index')->with('contactDetails', ContactDetails::where('is_active', true)->first());
    }

    public function store(Request $request)
    {
        $contactDetails = ContactDetails::where('is_active', true)->first();
        $contactDetails->update($request->all());

        return redirect()->route('contact.index')->with('success', 'Thank you for contacting us. We will get back to you shortly.');
    }
}
