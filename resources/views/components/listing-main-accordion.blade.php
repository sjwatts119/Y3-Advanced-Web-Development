<div class="divide-y divide-slate-200">
    <div x-data="{ expanded: false }" class="py-2">
        <h2>
            <button id="faqs-title-01" type="button" class="flex items-center justify-between w-full text-left font-semibold py-2" @click="expanded = !expanded" :aria-expanded="expanded" aria-controls="faqs-text-01">
                <span>Property and Local Area</span>
                <svg class="fill-indigo-500 shrink-0 ml-8" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out" :class="{'!rotate-180': expanded}" />
                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out" :class="{'!rotate-180': expanded}" />
                </svg>
            </button>
        </h2>
        <div id="faqs-text-01" role="region" aria-labelledby="faqs-title-01" class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out" :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
            <div class="overflow-hidden">
                <p class="pb-3">
                    {{strip_tags($listing->property)}}
                </p>
            </div>
        </div>
    </div>
    <!-- Accordion item -->
    <div x-data="{ expanded: false }" class="py-2">
        <h2>
            <button id="faqs-title-01" type="button" class="flex items-center justify-between w-full text-left font-semibold py-2" @click="expanded = !expanded" :aria-expanded="expanded" aria-controls="faqs-text-01">
                <span>Accommodation</span>
                <svg class="fill-indigo-500 shrink-0 ml-8" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out" :class="{'!rotate-180': expanded}" />
                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out" :class="{'!rotate-180': expanded}" />
                </svg>
            </button>
        </h2>
        <div id="faqs-text-01" role="region" aria-labelledby="faqs-title-01" class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out" :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
            <div class="overflow-hidden">
                <p class="pb-3">
                    {{strip_tags($listing->accommodation)}}
                </p>
            </div>
        </div>
    </div>
    <!-- Accordion item -->
    <div x-data="{ expanded: false }" class="py-2">
        <h2>
            <button id="faqs-title-01" type="button" class="flex items-center justify-between w-full text-left font-semibold py-2" @click="expanded = !expanded" :aria-expanded="expanded" aria-controls="faqs-text-01">
                <span>Reviews</span>
                <svg class="fill-indigo-500 shrink-0 ml-8" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out" :class="{'!rotate-180': expanded}" />
                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out" :class="{'!rotate-180': expanded}" />
                </svg>
            </button>
        </h2>
        <div id="faqs-text-01" role="region" aria-labelledby="faqs-title-01" class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out" :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
            <div class="overflow-hidden mt-5">
                @if($formattedReviews)
                    <div
                        x-data="{}"
                        x-init="$nextTick(() => {
                            let ul = $refs.logos;
                            ul.insertAdjacentHTML('afterend', ul.outerHTML);
                            ul.nextSibling.setAttribute('aria-hidden', 'true');
                        })"
                        class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_40px,_black_calc(100%-40px),transparent_100%)]">
                        <ul x-ref="logos" class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
                            @foreach($formattedReviews as $review)
                                <li>
                                    <x-review-card :review="$review"/>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p class="mb-2 text-gray-500 dark:text-gray-400">No reviews yet</p>
                @endif
            </div>
        </div>
    </div>
</div>
