{{--within this component we should have a grid of four listing-card-small components--}}
{{--these should be selected randomly from the range of listings passed in so we aren't showing the same listings each time--}}
@php
    //remove current listing from the list
    $listings = $listings->where('id', '!=', $currentListingId);
    //shuffle the listings and take the first 4
    $listings = $listings->shuffle()->take(4);
@endphp

@if($listings->count() > 0)
    {{--you may also like section--}}
    <div class="container mx-auto w-11/12 lg:w-3/4 pb-3">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">You may also like</h2>
    </div>

    <div class="lg:w-3/4 w-11/12 mx-auto grid grid-cols-2 lg:grid-cols-4 gap-4 pb-5">
        @foreach($listings as $listing)
            <x-listing-card-upsell :listing="$listing" />
        @endforeach
    </div>
@else
    <div class="container mx-auto w-11/12 lg:w-3/4 pb-10">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">No similar listings found</h2>
    </div>
@endif



