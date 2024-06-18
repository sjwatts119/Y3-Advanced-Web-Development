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
}
