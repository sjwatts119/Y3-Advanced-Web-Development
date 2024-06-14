<x-home-layout>

{{--put the jumbotron inside the header--}}
    <x-slot name="header">
        <section class="">
            <div class="py-12 px-4 mx-auto max-w-screen-xl text-center sm:py-72">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Welcome to {{$theme->company_name}}</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">We provide premium holiday cottages and unique converted buildings for a memorable stay. Explore our portfolio that includes a castle, a converted lighthouse, and a WWII military base.</p>
                <div class="py-5 flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                    <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-gradient-to-r from-blue-500 to-pink-500 hover:opacity-80 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        Book Now
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                    <a href="#" class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-70">
                        Explore Properties
                    </a>
                </div>
            </div>
        </section>
        {{--animated scroll down prompt--}}
        <div class="absolute bottom-30 left-0 right-0 flex justify-center pb-4">
            <svg class="w-6 h-6 text-gray-500 dark:text-gray-200 animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </x-slot>

    <div class="bg-gradient-to-b from-transparent to-gray-100 pt-20"></div>

    <section class="w-full bg-gray-100 pb-20">
        <div class="py-12 px-4 mx-auto max-w-screen-xl">
            <a href="{{route('properties.index')}}"><h2 class="hover:underline hover:text-black/70 mb-8 text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Our Properties</h2></a>
            @if($listings)
                {{--we should align the cards in a grid where it builds from the center and not from the left--}}
                {{--it should have three columns on large screens, two on medium screens, and one on small screens--}}
                <div class="border-black rounded-xl">
                    <x-featured-carousel :listings="$listings" />
                </div>
            @else
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400">No properties found.</p>
            @endif
        </div>
    </section>

    <section class="w-full bg-white">
        {{--why us?--}}
        <div class="py-12 px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Why Choose Us?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <div class="flex flex-col items-center justify-center space-y-4">
                    <svg class="w-16 h-16 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Unique Properties</h3>
                    <p class="text-gray-500 dark:text-gray-400">We offer a range of unique properties that are sure to make your stay memorable.</p>
                </div>
                <div class="flex flex-col items-center justify-center space-y-4">
                    <svg class="w-16 h-16 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Great Locations</h3>
                    <p class="text-gray-500 dark:text-gray-400">Our properties are located in beautiful areas with stunning views.</p>
                </div>
                <div class="flex flex-col items-center justify-center space-y-4">
                    <svg class="w-16 h-16 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Excellent Service</h3>
                    <p class="text-gray-500 dark:text-gray-400">Our team is dedicated to providing you with the best possible experience.</p>
                </div>
                <div class="flex flex-col items-center justify-center space-y-4">
                    <svg class="w-16 h-16 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Affordable Prices</h3>
                    <p class="text-gray-500 dark:text-gray-400">We offer competitive prices to ensure you get the best value for your money.</p>
                </div>
            </div>
        </div>
    </section>








</x-home-layout>




