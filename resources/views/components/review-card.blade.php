{{--Make a card with three rows, name, rating being shown as star emojis, and the review text--}}


<a class="block w-72 h-56 overflow-hidden max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

    <div class="md:items-center md:justify-between">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$review['name']}}</h5>
        <div class="flex items-center">
            @for($i=0; $i < $review['rating']; $i++)
                <span>&#11088;</span>
            @endfor
        </div>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between w-full">
            <p class="mb-2 text-gray-500 dark:text-gray-400">{{$review['review']}}</p>
        </div>
    </div>
</a>
