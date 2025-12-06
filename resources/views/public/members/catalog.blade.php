<x-layouts.public title="Членове">
    <!-- Hero -->
    <section class="bg-gradient-to-br from-primary-900 to-primary-800 text-white py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-4xl lg:text-5xl font-bold">Каталог на членовете</h1>
            <p class="mt-4 text-lg text-gray-300">
                Над 500 фирми от всички сектори на икономиката
            </p>
        </div>
    </section>

    <!-- Search & Filter -->
    <section class="bg-white border-b border-gray-200 sticky top-20 z-40">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4">
            <form method="GET" action="{{ route('members.catalog') }}" class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Търсене по име или дейност..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
                        >
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>
                </div>
                <div class="sm:w-64">
                    <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500">
                        <option value="">Всички категории</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="px-6 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
                    Търси
                </button>
                @if(request('search') || request('category'))
                    <a href="{{ route('members.catalog') }}" class="px-4 py-2 text-gray-600 hover:text-gray-900 font-medium">
                        Изчисти
                    </a>
                @endif
            </form>
        </div>
    </section>

    <!-- Members Grid -->
    <section class="py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if($members->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($members as $member)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                            <div class="flex items-start gap-4">
                                @if($member->logo)
                                    <img src="{{ Storage::url($member->logo) }}" alt="{{ $member->company_name }}" class="w-16 h-16 object-contain rounded-lg bg-gray-50">
                                @else
                                    <div class="w-16 h-16 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <span class="text-primary-600 font-bold text-xl">{{ Str::substr($member->company_name, 0, 2) }}</span>
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-heading font-semibold text-primary-900 truncate">{{ $member->company_name }}</h3>
                                    @if($member->category)
                                        <span class="inline-block mt-1 px-2 py-0.5 bg-gray-100 text-gray-600 text-xs rounded-full">
                                            {{ $member->category->name }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @if($member->main_activity)
                                <p class="mt-4 text-gray-600 text-sm line-clamp-2">{{ $member->main_activity }}</p>
                            @endif

                            <div class="mt-4 pt-4 border-t border-gray-100 space-y-2">
                                @if($member->address)
                                    <div class="flex items-start gap-2 text-sm text-gray-500">
                                        <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                        <span class="truncate">{{ $member->address }}</span>
                                    </div>
                                @endif
                                @if($member->phone)
                                    <div class="flex items-center gap-2 text-sm text-gray-500">
                                        <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                        <a href="tel:{{ $member->phone }}" class="hover:text-primary-600">{{ $member->phone }}</a>
                                    </div>
                                @endif
                                @if($member->website)
                                    <div class="flex items-center gap-2 text-sm text-gray-500">
                                        <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                        </svg>
                                        <a href="{{ $member->website }}" target="_blank" class="hover:text-primary-600 truncate">{{ str_replace(['https://', 'http://'], '', $member->website) }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $members->withQueryString()->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <svg class="w-16 h-16 text-gray-300 mx-auto" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Няма намерени членове</h3>
                    <p class="mt-2 text-gray-500">Опитайте с други критерии за търсене</p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-primary-900 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-heading text-3xl font-bold">Станете член на БТПП Плевен</h2>
            <p class="mt-4 text-primary-200 max-w-2xl mx-auto">
                Присъединете се към нашата мрежа от успешни бизнеси и се възползвайте от всички предимства на членството
            </p>
            <div class="mt-8">
                <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-accent-400 text-primary-900 font-semibold rounded-lg hover:bg-accent-500 transition-colors">
                    Свържете се с нас
                </a>
            </div>
        </div>
    </section>
</x-layouts.public>
