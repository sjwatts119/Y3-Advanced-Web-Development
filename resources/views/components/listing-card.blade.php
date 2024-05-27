{{--we have the following resources available:
        'user_id',
        'name',
        'slug',
        'description',
        'sleeps',
        'location',
        'attributes',
--}}

<div class="max-w-sm rounded-2xl overflow-hidden shadow-lg">
    @if($listing->GetFirstMediaUrl())
        <img class="w-full" src="{{ $listing->GetFirstMediaUrl() }}" alt="{{ $listing->name }}">
    @else
        <img class="w-full" src="https://via.placeholder.com/150" alt="{{ $listing->name }}">
    @endif
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $listing->name }}</div>
        <p class="text-gray-700 text-base">
            {{ $listing->friendlyDescription() }}
        </p>
    </div>
    <div class="px-6 py-4">
        {{-- loop through the attributes which have been stored as json and casted to an array, with each record being in format: "key": value --}}
        @foreach($listing->attributes as $key => $value)
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $key }}: {{ $value }}</span>
        @endforeach
    </div>
</div>









