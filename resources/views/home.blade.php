<x-home-layout>

{{--put the jumbotron inside the header--}}
    <x-slot name="header">
        <section class="">
            <div class="py-12 px-4 mx-auto max-w-screen-xl text-center sm:py-48">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Welcome to {{$theme->company_name}}</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">We provide premium holiday cottages and unique converted buildings for a memorable stay. Explore our portfolio that includes a castle, a converted lighthouse, and a WWII military base.</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                    <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
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
    </x-slot>

    <div class="bg-gradient-to-b from-transparent to-white pt-20"></div>

    <section class="w-full bg-white">
        <div class="py-12 px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Our Properties</h2>
        </div>
    </section>







</x-home-layout>




