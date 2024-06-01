<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{--add a return link--}}
            <a href="{{ route('properties.index') }}" class="text-blue-500 hover:text-blue-700">Properties</a> /
            {{ __($listing->name) }}
        </h2>
    </x-slot>

    <div class="container mx-auto w-11/12 lg:w-3/4 bg-white rounded-2xl mt-5">
        <x-listing-main :listing="$listing" :formattedReviews="$formattedReviews" />
    </div>

    {{--page divider--}}
    <div class="container mx-auto px-4 py-10">
        <hr class="border-t-2 border-gray-200 dark:border-gray-700">
    </div>

    {{--include upsell component passing in all listings and current listing ID --}}
    <x-upsell :listings="$listings" :currentListingId="$listing->id" />

    {{--page divider--}}

</x-app-layout>
