<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{--add a return link--}}
            <a href="{{ route('properties.index') }}" class="text-blue-500 hover:text-blue-700">Properties</a> /
            <a href="{{ route('properties.show', $listing->slug) }}" class="text-blue-500 hover:text-blue-700">{{ __($listing->name) }}</a> /
            {{ __('Book') }}
        </h2>
    </x-slot>
</x-app-layout>
