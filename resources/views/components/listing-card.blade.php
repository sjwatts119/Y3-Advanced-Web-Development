{{--we have the following resources available:
        'user_id',
        'name',
        'slug',
        'description',
        'sleeps',
        'location',
        'attributes',
--}}

<a href="properties/{{$listing->slug}}" class="h-full flex flex-col items-center bg-white shadow lg:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    {{--show the listing's first image as to where it is always the same size, and maintains the same aspect ratio--}}
    <div class="overflow-hidden lg:w-1/2 w-full lg:h-full ">
        @if($listing->GetFirstMediaUrl())
            <img class="object-cover w-full lg:h-full h-96 m-auto" src="{{ $listing->GetFirstMediaUrl() }}" alt="{{ $listing->name }}">
        @else
            <img class="object-cover w-full lg:h-full m-auto" src="https://via.placeholder.com/150" alt="{{ $listing->name }}">
        @endif
    </div>
    <div class="lg:w-1/2 w-full lg:min-h-0 flex flex-col p-4 leading-normal pr-10">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$listing->name}}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$listing->friendlyDescription()}}</p>
            <div class="flex flex-wrap">
                {{--loop through attributes and show icons if they are true--}}
                @foreach($listing->attributes as $key => $value)
                    @if($value)
                        <span class="inline-block bg-green-200 rounded-full px-3 py-1 my-1 text-sm font-semibold text-gray-700 mr-1">{{$key}}</span>
                    @endif
                @endforeach
            </div>
    </div>
</a>













