<x-guest-layout>
    {{--we should have a rounded square in the middle of our screen horizontally and vertically with our success message--}}
    <div class="flex items-center justify-center w-full">
        <div class="rounded-xl bg-white p-8">
            <h1 class="text-2xl font-bold text-center text-gray-900 dark:text-white">Booking successful!</h1>
            <p class="text-center text-gray-700 dark:text-gray-400">Thank you for booking with us. We will be in touch shortly.</p>
        </div>
    </div>

    <div class="flex items-center justify-center">
        {{--add a button to return to the home page--}}
        <a href="{{route('properties.index')}}" class="inline-flex items-center justify-center px-4 py-2 mt-4 text-sm font-medium text-white bg-blue-700 border border-transparent rounded-md shadow-sm hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Return to Home
        </a>
    </div>

    <div id="confetti"></div>

</x-guest-layout>


