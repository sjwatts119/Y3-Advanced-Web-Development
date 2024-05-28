{{--we have the following resources available:
        'user_id',
        'name',
        'slug',
        'description',
        'sleeps',
        'location',
        'attributes',
--}}

{{--<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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
            @foreach($listing->attributes as $key => $value)
                @if($value)
                    <span class="inline-block bg-green-200 rounded-full px-3 py-1 my-1 text-sm font-semibold text-gray-700 mr-1">{{ $key }}</span>
                @endif
            @endforeach
        </div>
    </div>
</div>
--}}



<a href="#" class="h-full flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    {{--show the listing's first image as to where it is always the same size, and maintains the same aspect ratio--}}
    <div class="overflow-hidden md:w-1/2 w-full md:h-full ">
        @if($listing->GetFirstMediaUrl())
            <img class="object-cover w-full md:h-full m-auto" src="{{ $listing->GetFirstMediaUrl() }}" alt="{{ $listing->name }}">
        @else
            <img class="object-cover w-full md:h-full m-auto" src="https://via.placeholder.com/150" alt="{{ $listing->name }}">
        @endif
    </div>
    <div class="md:w-1/2 flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$listing->name}}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$listing->friendlyDescription()}}</p>
        <div class="flex flex-wrap -m-1">
            @foreach($listing->attributes as $key => $value)
                @if($value)
                    <span class="inline-block bg-green-200 rounded-full px-3 py-1 my-1 text-sm font-semibold text-gray-700 mr-1">{{$key}}</span>
                @endif
            @endforeach
        </div>
    </div>
</a>













