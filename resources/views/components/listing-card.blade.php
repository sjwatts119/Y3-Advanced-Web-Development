{{--we have the following resources available:
        'user_id',
        'name',
        'slug',
        'description',
        'sleeps',
        'location',
        'attributes',
--}}

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a class="block overflow-hidden rounded-t-lg h-60" href="#" >
        @if($listing->GetFirstMediaUrl())
            <img class="rounded-t-lg object-cover w-full" src="{{ $listing->GetFirstMediaUrl() }}" alt="{{ $listing->name }}">
        @else
            <img class="rounded-t-lg object-cover w-full" src="https://via.placeholder.com/150" alt="{{ $listing->name }}">
        @endif
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $listing->name }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $listing->friendlyDescription() }}</p>
        <div class="flex flex-wrap -m-1">
            {{-- loop through the attributes which have been stored as json and casted to an array, with each record being in format: "key": value --}}
            @foreach($listing->attributes as $key => $value)
                @if($value)
                    <span class="inline-block bg-green-200 rounded-full px-3 py-1 my-1 text-sm font-semibold text-gray-700 mr-1">{{ $key }}</span>
                @endif
            @endforeach
        </div>
    </div>
</div>









