<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $listing->name }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="container mx-auto md:w-2/3 w-full md:min-h-0 flex flex-col p-4 leading-normal">
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
                    <div class="grid grid-cols-5 gap-4 h-16">
                        @foreach($media->take(5) as $mediaItem)
                            <a href="{{ $mediaItem->getUrl() }}" class="glightbox">
                                <img class="h-24 w-full overflow-hidden object-cover rounded-lg" src="{{ $mediaItem->getUrl() }}" alt="{{ $listing->name }}">
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
