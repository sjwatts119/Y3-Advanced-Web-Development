<x-app-layout>

    {{--dd($listings)--}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="">Properties</div>
        </h2>
    </x-slot>

    @if($listings->count() > 0)
        {{--80% width container auto margin left and right --}}
        <div class="container lg:w-3/4 w-11/12 mx-auto mt-5">
            {{--insert the featured-carousel component--}}
            <x-featured-carousel :listings="$listings" />
        </div>

        {{--page divider--}}
        <div class="container mx-auto px-4 py-10">
            <hr class="border-t-2 border-gray-200 dark:border-gray-700">
        </div>

        {{--loop through the listings and show a small card each, with up to 4 per row--}}
        <div class="container lg:w-3/4 w-11/12 mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4">
                @foreach($listings as $listing)
                    <x-listing-card-small :listing="$listing" />
                @endforeach
            </div>
        </div>
    @else
        <div class="container mx-auto w-11/12 lg:w-3/4 pb-10">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white pt-10">No property listings found :(</h2>
        </div>
    @endif



</x-app-layout>



