<x-app-layout>

    {{--dd($listings)--}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Property Listings') }}
        </h2>
    </x-slot>

    {{--insert the featured-carousel component--}}
    <x-featured-carousel :listings="$listings" />



</x-app-layout>



