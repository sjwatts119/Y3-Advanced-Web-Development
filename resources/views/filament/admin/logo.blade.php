<div class="fi-logo flex text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white">
    @if($theme->company_name)
        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <span>{{ $theme->company_name }}</span>
        </a>
    @else
        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <span>{{ config('app.name') }}</span>
        </a>
    @endif
</div>
