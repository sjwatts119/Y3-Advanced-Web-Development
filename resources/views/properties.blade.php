<x-app-layout>

    {{--dd($listings)--}}

    @foreach($listings as $listing)
        @include('components.listing-card', ['listing' => $listing])
    @endforeach

</x-app-layout>


