<div class="rounded-xl w-full">

    <x-listing-image-carousel :listing="$listing" />

    <div class="container mx-auto w-full md:min-h-0 flex flex-col p-8 pt-0 leading-normal">
        <div class="flex flex-wrap pb-2">
            {{--loop through attributes and show icons if they are true--}}
            @foreach($listing->attributes as $attribute)
                <span class="inline-block bg-green-200 rounded-full px-3 py-1 my-1 text-xs font-semibold text-gray-700 mr-1">{{$attribute}}</span>
            @endforeach
        </div>
        {{--add location with pin icon--}}
        <div class="flex items-center pb-2">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22s-8-4.5-8-11a8 8 0 0 1 16 0c0 6.5-8 11-8 11z"/>
                <circle cx="12" cy="10" r="3" fill="currentColor"/>
            </svg>
            <p class="ml-2 text-sm text-gray-700 dark:text-gray-400">{{$listing->location}}</p>
        </div>
        {{--add sleeps with bed svg icon--}}
        <div class="flex items-center pb-2">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" viewBox="0 0 14 14" role="img" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M 4.3,7 C 5.1270625,7 5.8,6.32706 5.8,5.5 5.8,4.67294 5.1270625,4 4.3,4 3.4729375,4 2.8,4.67294 2.8,5.5 2.8,6.32706 3.4729375,7 4.3,7 Z m 6.6,-2.4 -4.2,0 C 6.53425,4.6 6.4,4.73425 6.4,4.9 l 0,2.7 -4.2,0 0,-3.9 C 2.2,3.53425 2.06575,3.4 1.9,3.4 l -0.6,0 C 1.13425,3.4 1,3.53425 1,3.7 l 0,6.6 c 0,0.16575 0.13425,0.3 0.3,0.3 l 0.6,0 c 0.16575,0 0.3,-0.13425 0.3,-0.3 l 0,-0.9 9.6,0 0,0.9 c 0,0.16575 0.13425,0.3 0.3,0.3 l 0.6,0 c 0.16575,0 0.3,-0.13425 0.3,-0.3 L 13,6.7 C 13,5.54013 12.059875,4.6 10.9,4.6 Z"/>
            </svg>
            <p class="ml-2 text-sm text-gray-700 dark:text-gray-400">Sleeps {{$listing->sleeps}}</p>
        </div>

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$listing->name}}</h5>

        <x-listing-main-accordion :listing="$listing" :formattedReviews="$formattedReviews" />

        {{--make a button to book the listing--}}
        <div class="flex w-full">
            <a href="{{ route('properties.book', $listing->slug) }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-pink-500 opacity-80 hover:opacity-100 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 w-full transition">
                Book this Property
            </a>
        </div>
    </div>

</div>
