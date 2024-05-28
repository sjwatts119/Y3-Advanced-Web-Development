{{--we have the following resources available:
        'user_id',
        'name',
        'slug',
        'description',
        'sleeps',
        'location',
        'attributes',
--}}

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ "Viewing Property: " . $listing->name }}
        </h2>
    </x-slot>

    {{--make a page wide container 80% width--}}
    <div class="container mx-auto px-4 bg-white">

        {{--We should display all of the images for the listing in a carousel, and we should be able to click the carousel to view all of the images in a lightbox--}}
        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2">
                <div class="owl-carousel owl-theme">
                    @foreach($listing->getMedia('images') as $image)
                        <div class="item">
                            <img class="w-full" src="{{ $image->getUrl() }}" alt="{{ $listing->name }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$listing->name}}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$listing->description}}</p>
                <div class="flex flex-wrap">
                    {{--loop through attributes and show icons if they are true--}}
                    @foreach($listing->attributes as $key => $value)
                        @if($value)
                            <span class="inline-block bg-green-200 rounded-full px-3 py-1 my-1 text-sm font-semibold text-gray-700 mr-1">{{$key}}</span>
                        @endif
                    @endforeach
                </div>
            </div>
    </div>





</x-app-layout>



