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
            'listings' => PropertyListing::all(),
            'formattedReviews' => $this->formatReviews(PropertyListing::where('slug', $slug)->first()->reviews),
        ]);
    }

    //used to format the reviews for the show view
    public function formatReviews($reviews){
        //are there any reviews?
        if(count($reviews) == 0){
            return [];
        }

        if(count($reviews) < 6) {
            $reviewsCount = count($reviews);
            $reviewsToDisplay = 6 - $reviewsCount;
            for ($i = 0; $i < $reviewsToDisplay; $i++) {
                $reviews[] = $reviews[$i];
            }
        }
        else if (count($reviews) > 15) {
            //shuffle $reviews and take the first 15
            shuffle($reviews);
            $reviews = array_slice($reviews, 0, 15);
        }
        return $reviews;
    }
}
