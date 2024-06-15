<x-home-layout>

{{--put the jumbotron inside the header--}}
    <x-slot name="header">
        <section class="min-h-[calc(85vh)] flex flex-col justify-between">
            <div class="py-12 px-4 mx-auto max-w-screen-xl text-center sm:py-72">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Welcome to {{$theme->company_name}}</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">We provide premium holiday cottages and unique converted buildings for a memorable stay. Explore our portfolio that includes a castle, a converted lighthouse, and a WWII military base.</p>
                <div class="py-5 flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                    <a href="{{route('properties.index')}}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-gradient-to-r from-blue-500 to-pink-500 hover:opacity-80 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        Explore
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                    <a href="{{route('contact.index')}}" class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-70">
                        Contact Us
                    </a>
                </div>
            </div>
            <div class="flex justify-center pb-4">
                <svg class="w-6 h-6 text-gray-500 dark:text-gray-200 animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </div>
        </section>
    </x-slot>

    <div class="bg-gradient-to-b from-transparent to-gray-100 pt-20"></div>

    <section class="w-full bg-gray-100 pb-20">
        <div class="py-12 px-4 mx-auto max-w-screen-xl">
            <a href="{{route('properties.index')}}"><h2 class="hover:underline hover:text-black/70 mb-8 text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white text-center">Our Properties</h2></a>
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

    <div class="bg-gradient-to-r from-blue-500 to-pink-500 pt-1"></div>

    <section class="w-full bg-gradient-to-l from-blue-50 to-pink-50 pb-20">
        {{--why us?--}}
        <div class="py-12 px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white text-center">Why Choose Us?</h2>
            <div class="w-full lg:w-2/3 grid grid-cols-1 sm:grid-cols-2 gap-8 mx-auto">
                <div class="min-h-60 rounded-lg bg-gradient-to-r from-blue-500 to-pink-500 p-1">
                    <div class="flex h-full rounded-md w-full items-center justify-center bg-gradient-to-r from-blue-50 to-pink-50 text-black back">
                        <div class="flex flex-col items-center justify-center space-y-4 p-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-16">
                                <defs>
                                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" style="stop-color:#F472B6" /> <!-- pink-500 -->
                                        <stop offset="100%" style="stop-color:#3B82F6" /> <!-- blue-500 -->
                                    </linearGradient>
                                </defs>
                                <path stroke="url(#gradient)" stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>

                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{$listings->count()}} Properties Available</h3>
                            <p class="text-gray-500 dark:text-gray-400 text-center">We offer a range of unique properties that are sure to make your stay memorable.</p>
                        </div>
                    </div>
                </div>
                <div class="min-h-60 rounded-lg bg-gradient-to-r from-blue-500 to-pink-500 p-1">
                    <div class="flex h-full rounded-md w-full items-center justify-center bg-gradient-to-r from-blue-50 to-pink-50 text-black back">
                        <div class="flex flex-col items-center justify-center space-y-4 p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 50 50" stroke-width="2.5" class="size-16">
                                <defs>
                                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" style="stop-color:#F472B6" /> <!-- pink-500 -->
                                        <stop offset="100%" style="stop-color:#3B82F6" /> <!-- blue-500 -->
                                    </linearGradient>
                                </defs>
                                {{--heart svg--}}
                                <path stroke="url(#gradient)" stroke-linecap="round" stroke-linejoin="round" d="M25 39.7l-.6-.5C11.5 28.7 8 25 8 19c0-5 4-9 9-9 4.1 0 6.4 2.3 8 4.1 1.6-1.8 3.9-4.1 8-4.1 5 0 9 4 9 9 0 6-3.5 9.7-16.4 20.2l-.6.5zM17 12c-3.9 0-7 3.1-7 7 0 5.1 3.2 8.5 15 18.1 11.8-9.6 15-13 15-18.1 0-3.9-3.1-7-7-7-3.5 0-5.4 2.1-6.9 3.8L25 17.1l-1.1-1.3C22.4 14.1 20.5 12 17 12z" />
                            </svg>

                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Trusted Service</h3>
                            <p class="text-gray-500 dark:text-gray-400 text-center">We have provided a fantastic experience to <b>{{$bookings->where('status', 'approved')->count()}}</b> families, individuals and more.</p>
                        </div>
                    </div>
                </div>
                <div class="min-h-60 rounded-lg bg-gradient-to-r from-blue-500 to-pink-500 p-1">
                    <div class="flex h-full rounded-md w-full items-center justify-center bg-gradient-to-r from-blue-50 to-pink-50 text-black back">
                        <div class="flex flex-col items-center justify-center space-y-4 p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-16">
                                <defs>
                                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" style="stop-color:#F472B6" /> <!-- pink-500 -->
                                        <stop offset="100%" style="stop-color:#3B82F6" /> <!-- blue-500 -->
                                    </linearGradient>
                                </defs>
                                <path stroke="url(#gradient)" stroke-linecap="round" stroke-linejoin="round" d="M12 10.4V20M12 10.4C12 8.15979 12 7.03969 11.564 6.18404C11.1805 5.43139 10.5686 4.81947 9.81596 4.43597C8.96031 4 7.84021 4 5.6 4H4.6C4.03995 4 3.75992 4 3.54601 4.10899C3.35785 4.20487 3.20487 4.35785 3.10899 4.54601C3 4.75992 3 5.03995 3 5.6V16.4C3 16.9601 3 17.2401 3.10899 17.454C3.20487 17.6422 3.35785 17.7951 3.54601 17.891C3.75992 18 4.03995 18 4.6 18H7.54668C8.08687 18 8.35696 18 8.61814 18.0466C8.84995 18.0879 9.0761 18.1563 9.29191 18.2506C9.53504 18.3567 9.75977 18.5065 10.2092 18.8062L12 20M12 10.4C12 8.15979 12 7.03969 12.436 6.18404C12.8195 5.43139 13.4314 4.81947 14.184 4.43597C15.0397 4 16.1598 4 18.4 4H19.4C19.9601 4 20.2401 4 20.454 4.10899C20.6422 4.20487 20.7951 4.35785 20.891 4.54601C21 4.75992 21 5.03995 21 5.6V16.4C21 16.9601 21 17.2401 20.891 17.454C20.7951 17.6422 20.6422 17.7951 20.454 17.891C20.2401 18 19.9601 18 19.4 18H16.4533C15.9131 18 15.643 18 15.3819 18.0466C15.15 18.0879 14.9239 18.1563 14.7081 18.2506C14.465 18.3567 14.2402 18.5065 13.7908 18.8062L12 20"></path>
                            </svg>

                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Flexible Booking</h3>
                            <p class="text-gray-500 dark:text-gray-400 text-center">We offer flexible booking options to suit your needs.</p>
                        </div>
                    </div>
                </div>
                <div class="min-h-60 rounded-lg bg-gradient-to-r from-blue-500 to-pink-500 p-1">
                    <div class="flex h-full rounded-md w-full items-center justify-center bg-gradient-to-r from-blue-50 to-pink-50 text-black back">
                        <div class="flex flex-col items-center justify-center space-y-4 p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-16">
                                <defs>
                                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" style="stop-color:#F472B6" /> <!-- pink-500 -->
                                        <stop offset="100%" style="stop-color:#3B82F6" /> <!-- blue-500 -->
                                    </linearGradient>
                                </defs>
                                <path stroke="url(#gradient)" stroke-linecap="round" stroke-linejoin="round" d="M18 9C18 13.7462 14.2456 18.4924 12.6765 20.2688C12.3109 20.6827 11.6891 20.6827 11.3235 20.2688C9.75444 18.4924 6 13.7462 6 9C6 7 7.5 3 12 3C16.5 3 18 7 18 9Z"></path>
                                <circle stroke="url(#gradient)" stroke-linecap="round" stroke-linejoin="round" cx="12" cy="9" r="2"></circle>
                            </svg>

                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Great Locations</h3>
                            <p class="text-gray-500 dark:text-gray-400 text-center">Our properties are located in beautiful and scenic locations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-gradient-to-r from-blue-500 to-pink-500 pt-1"></div>

    {{--video section with bg-gray-100--}}
    <section class="w-full bg-gray-100">
        <div class="py-12 pb-32 px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white text-center">Watch Our Video</h2>
            <div class="w-full">
                {{-- make a container for the youtube video and center it --}}
                <div class="flex items-center justify-center rounded-xl h-[500px] sm:h-[700px]">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/L7iyJzwWb0c?si=zBfgTr6aHCGzY_GT" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-gradient-to-r from-blue-500 to-pink-500 pt-1"></div>

    {{--get in touch jumbotron--}}
    <section>
        <div class="py-32 px-4 mx-auto max-w-screen-xl text-center">
            <h2 class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Get In Touch</h2>
            <p class="mb-8 text-lg font-normal text-gray-500 dark:text-gray-400">We would love to hear from you. If you have any questions or would like to book a property, please get in touch.</p>
            <a href="{{route('contact.index')}}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-gradient-to-r from-blue-500 to-pink-500 hover:opacity-80 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Contact Us
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </section>




</x-home-layout>




