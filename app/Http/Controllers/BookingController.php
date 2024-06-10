<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    //return index view
    public function index()
    {
        return view('bookings.index');
    }
}
