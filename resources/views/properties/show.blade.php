<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $listing->name }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 mt-5">
        <div class="bg-white rounded-xl lg:w-2/3 w-full mx-auto">

            <div class="container md:min-h-0 flex flex-col p-4 leading-normal">
                <div class="grid gap-4">
                    <div>
                        @if($listing->GetFirstMediaUrl())
                            <a href="{{ $listing->getFirstMediaUrl() }}" class="glightbox">
                                <img class="h-auto w-full max-h-96 overflow-hidden object-cover rounded-lg" src="{{ $listing->getFirstMediaUrl() }}" alt="{{ $listing->name }}">
                            </a>
                        @else
                            <img class="h-auto max-w-full rounded-lg" src="https://via.placeholder.com/150" alt="{{ $listing->name }}">
                        @endif
                    </div>
                    @php
                        $media = $listing->getMedia();
                    @endphp
                    @if($media->count() > 1)
                        <div class="md:grid grid-cols-5 gap-4 h-full hidden">
                            @foreach($media->take(5) as $mediaItem)
                                <a href="{{ $mediaItem->getUrl() }}" class="glightbox">
                                    <img class="h-24 w-full overflow-hidden object-cover rounded-lg" src="{{ $mediaItem->getUrl() }}" alt="{{ $listing->name }}">
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            {{--make a container for the listing's details--}}
            <div class="container mx-auto w-full md:min-h-0 flex flex-col p-4 leading-normal">
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

        </div>


    </div>
</x-app-layout>
