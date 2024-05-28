<?php

namespace App\Http\Controllers;

use App\Models\PropertyListing;
use Illuminate\Http\Request;

class PropertyListingController extends Controller
{
    //make a function to show all property listings
    public function index(){
        return view('properties.index', ['listings' => PropertyListing::all()]);
    }

    //make a function to show a specific property listing
    public function show($slug){
        return view('properties.show', ['listing' => PropertyListing::where('slug', $slug)->first()]);
    }
}
