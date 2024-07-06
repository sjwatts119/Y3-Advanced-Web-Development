<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Mail\BookingRequested;
use App\Models\ContactDetails;
use App\Models\PropertyListing;
Use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function book($slug){
        //we don't want to attempt an upsell on the booking page, so don't need to pass all listings
        return view('properties.book', ['listing' => PropertyListing::where('slug', $slug)->first()]);
    }

    public function success(){
        //we must only show the success page if the user has just booked a property, they should not be able to access this page directly
        if(session()->has('booking_success')){
            session()->forget('booking_success');
            return view('properties.success');
        }
        else{
            return redirect()->route('home');
        }
    }

    public function storeBooking(StoreBookingRequest $request)
    {
        $validatedData = $request->validated();

        //create a new booking object
        $booking = new Booking();
        $booking->property_listing_id = $validatedData['listing_id'];
        $booking->start_date = $validatedData['start_date'];
        $booking->end_date = $validatedData['end_date'];
        $booking->user_name = $validatedData['name'];
        $booking->user_email = $validatedData['email'];
        $booking->user_phone_number = $validatedData['phone'];
        $booking->message = $validatedData['notes'];

        //if booking is successful, redirect to the bookings page
        if($booking->save()){
            session()->put('booking_success', true);
            $slug = $booking->propertyListing->slug;
            //retrieve the property name from the property listing model
            //this is horribly hacky changing the db schema isn't worth the time right now
            $propertyName = PropertyListing::find($booking->property_listing_id)->name ?? 'Property Not Found';

            //use the mail facade to send the email
            try{
                Mail::to($booking->user_email)->send(new BookingRequested($booking, $propertyName));
            }
            catch(\Exception $e){
                return redirect()->route('properties.success', ['slug' => $slug])->with('error', 'Email failed to send. Your booking was successful.');
            }

            return redirect()->route('properties.success', ['slug' => $slug])->with('success', 'Booking successful');
        }
        else{
            //if booking fails, redirect back to the booking page with an error message
            return redirect()->back()->with('error', 'Booking failed');
        }
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
