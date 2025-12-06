<x-layouts.public title="Новини">
    <!-- Hero -->
    <section class="bg-gradient-to-br from-primary-900 to-primary-800 text-white py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-4xl lg:text-5xl font-bold">Новини</h1>
            <p class="mt-4 text-lg text-gray-300">
                Бъдете информирани за последните събития в бизнес средата
            </p>
        </div>
    </section>

    <!-- News Grid -->
    <section class="py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if($news->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($news as $item)
                        <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow border border-gray-100">
                            @if($item->image)
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                    <span>{{ $item->published_at?->format('d.m.Y') }}</span>
                                    @if($item->category)
                                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                        <span class="px-2 py-0.5 bg-primary-100 text-primary-700 rounded-full text-xs">{{ $item->category_label }}</span>
                                    @endif
                                </div>
                                <h2 class="font-heading text-lg font-semibold text-primary-900 line-clamp-2">
                                    <a href="{{ route('news.show', $item) }}" class="hover:text-primary-600 transition-colors">
                                        {{ $item->title }}
                                    </a>
                                </h2>
                                <p class="mt-2 text-gray-600 text-sm line-clamp-3">{{ $item->excerpt }}</p>
                                <a href="{{ route('news.show', $item) }}" class="mt-4 inline-flex items-center text-primary-600 font-medium text-sm hover:text-primary-700">
                                    Прочети повече
                                    <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $news->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <svg class="w-16 h-16 text-gray-300 mx-auto" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Няма публикувани новини</h3>
                    <p class="mt-2 text-gray-500">Проверете отново по-късно за последни новини</p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.public>
