<footer class="bg-white shadow dark:bg-gray-900">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                {{--insert the logo component--}}
                @if($theme->getFirstMediaUrl())
                    <img src="{{ $theme->getFirstMediaUrl()}}" alt="{{ $theme->company_name }}" class="max-w-12 max-h-12" />
                @else
                    <x-application-logo class="block h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
                @endif
                {{--add the application name from the env file for now--}}
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                    {{ $theme->company_name }}
                </span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="{{route('home')}}" class="hover:underline me-4 md:me-6">Home</a>
                </li>
                <li>
                    <a href="{{route('privacy-policy')}}" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="{{route('contact.index')}}" class="hover:underline">Contact Us</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="{{route('home')}}" class="hover:underline">{{ $theme->company_name }}</a>. All Rights Reserved.</span>
    </div>
</footer>
