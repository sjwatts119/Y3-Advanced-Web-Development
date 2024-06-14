{{--we have the following resources available:
        'user_id',
        'name',
        'slug',
        'description',
        'sleeps',
        'location',
        'attributes',
--}}

<a href="{{ route('properties.show', $listing->slug) }}" class="max-w-96 rounded-2xl overflow-hidden h-full flex flex-col items-center bg-white shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 rounded-2xl">
    <div class="overflow-hidden w-full ">
        @if($listing->GetFirstMediaUrl())
            <img class="object-cover w-full h-48 m-auto" src="{{ $listing->GetFirstMediaUrl() }}" alt="{{ $listing->name }}">
        @else
            <img class="object-cover w-full h-48 m-auto" src="https://placehold.co/400" alt="{{ $listing->name }}">
        @endif
    </div>
    <div class="w-full lg:min-h-0 flex flex-col p-4 leading-normal pr-10">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$listing->name}}</h5>
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
        <div class="flex flex-wrap">
            @foreach($listing->attributes as $attribute)
                <span class="inline-block bg-green-200 rounded-full px-3 py-1 my-1 text-xs font-semibold text-gray-700 mr-1">{{$attribute}}</span>
            @endforeach
        </div>
    </div>
</a>













