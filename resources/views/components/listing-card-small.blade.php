{{--we have the following resources available:
        'user_id',
        'name',
        'slug',
        'description',
        'sleeps',
        'location',
        'attributes',
--}}

<a href="properties/{{$listing->slug}}" class="rounded-2xl overflow-hidden h-full flex flex-col items-center bg-white shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 rounded-2xl">
    <div class="overflow-hidden w-full ">
        @if($listing->GetFirstMediaUrl())
            <img class="object-cover w-full h-48 m-auto" src="{{ $listing->GetFirstMediaUrl() }}" alt="{{ $listing->name }}">
        @else
            <img class="object-cover w-full h-48 m-auto" src="https://via.placeholder.com/150" alt="{{ $listing->name }}">
        @endif
    </div>
    <div class="w-full lg:min-h-0 flex flex-col p-4 leading-normal pr-10">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$listing->name}}</h5>
        <div class="flex flex-wrap">
            @foreach($listing->attributes as $key => $value)
                @if($value)
                    <span class="inline-block bg-green-200 rounded-full px-3 py-1 my-1 text-sm font-semibold text-gray-700 mr-1">{{$key}}</span>
                @endif
            @endforeach
        </div>
    </div>
</a>













