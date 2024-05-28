<x-app-layout>

    {{--dd($listings)--}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Property Listings') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex flex-wrap">
                @foreach($listings as $listing)
                    @include('components.listing-card', ['listing' => $listing])
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>


