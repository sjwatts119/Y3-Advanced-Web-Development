<?php

namespace App\Http\Controllers;

use App\Models\PropertyListing;
use Illuminate\Http\Request;

class PropertyListingController extends Controller
{
    public function index(){
        return view('properties.index', ['listings' => PropertyListing::all()]);
    }

    public function show($slug){
        return view('properties.show', [
            'listing' => PropertyListing::where('slug', $slug)->first(),
            'listings' => PropertyListing::all()
        ]);
    }
}
