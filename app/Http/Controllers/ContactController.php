<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\ContactDetails;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //return contact view
    public function index()
    {
        return view('contact.index')->with('contactDetails', ContactDetails::getContactDetails());
    }

    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();

        dd($validated);

        //we need to email the user saying the message has been received

        //we need to store the message in the database so the admin can view it

        return redirect()->route('contact.index')->with('success', 'Thank you for contacting us. We will get back to you shortly.');
    }
}
