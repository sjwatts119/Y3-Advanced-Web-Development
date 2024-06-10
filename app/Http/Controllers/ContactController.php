<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //return contact view
    public function index()
    {
        return view('contact.index');
    }
}
