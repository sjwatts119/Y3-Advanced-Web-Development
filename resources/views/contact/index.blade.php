<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Us') }}

        </h2>
    </x-slot>
    
    {{ $contactDetails->name }}
    {{ $contactDetails->email }}
    {{ $contactDetails->phone }}
    {{ $contactDetails->address }}

</x-app-layout>
