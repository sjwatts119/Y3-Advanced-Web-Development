<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactReceived;
use App\Models\ContactDetails;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //return contact view
    public function index()
    {
        return view('contact.index')->with('contactDetails', ContactDetails::getContactDetails());
    }

    public function success()
    {
        if(session()->has('contact_success')){
            session()->forget('contact_success');
            return view('contact.success');
        }
        else{
            return redirect()->route('home');
        }
    }

    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();

        //we need to store the message in the database so the admin can view it
        $contact = new Message();
        $contact->email = $validated['email'];
        $contact->phone = $validated['phone'];
        $contact->subject = $validated['subject'];
        $contact->message = $validated['message'];

        if($contact->save()){
            //email the user to confirm their message has been received
            try{
                Mail::to($validated['email'])->send(new ContactReceived());
            }
            catch(\Exception $e){
                return redirect()->route('contact.index')->with('error', 'Email failed to send. Your message was passed on successfully.');
            }

            session()->put('contact_success', true);
            return redirect()->route('contact.success')->with('success', 'Message sent successfully');
        }
        else{
            return redirect()->route('contact.index')->with('error', 'Message failed to send');
        }
    }
}
