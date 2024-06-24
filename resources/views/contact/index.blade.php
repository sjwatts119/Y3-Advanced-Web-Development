<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="">Contact Us</div>
        </h2>
    </x-slot>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-10 mx-auto">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.</p>
    </div>

    <div class="flex flex-col lg:flex-row w-full sm:w-5/6 md:w-3/4 mx-auto">
        <div class="flex-col container">
            <div class="grid grid-cols-1 gap-4 sm:mt-10">
                <div class="flex flex-col items-center justify-center space-y-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-900 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-200">Company Info</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Company Name: {{$theme->company_name}}</p>
                </div>
                <div class="flex flex-col items-center justify-center space-y-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-900 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-200">Our Address</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{$contactDetails->address}}</p>
                </div>
                <div class="flex flex-col items-center justify-center space-y-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-900 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-200">Our Email</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{$contactDetails->email}}</p>
                </div>
                <div class="flex flex-col items-center justify-center space-y-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-900 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-200">Call Us</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{$contactDetails->phone}}</p>
                </div>
            </div>
        </div>
        <div class="flex-col container w-full">
            <div class="container mx-auto w-full md:min-h-0 flex flex-col p-8 pt-0 leading-normal">
                <div class="">
                    <form action="{{route('contact.store')}}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email<a><span class="text-red-500">*</span></a></label>
                            <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@email.com" required>
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your phone number<a><span class="text-red-500">*</span></a></label>
                            <input type="tel" id="phone" name="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="+44123456789" required>
                        </div>
                        <div>
                            <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject<a><span class="text-red-500">*</span></a></label>
                            <input type="text" id="subject" name="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message<a><span class="text-red-500">*</span></a></label>
                            <textarea id="message" name="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
                        </div>
                        <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-r from-blue-500 to-pink-500 hover:opacity-80 sm:w-fit focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-800">Send message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
