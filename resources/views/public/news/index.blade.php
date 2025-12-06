<x-layouts.public title="Новини">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900 text-white pt-20 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-72 h-72 bg-accent-400/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-primary-600/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
        </div>

        <!-- Decorative Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"><g fill=\"none\" fill-rule=\"evenodd\"><g fill=\"%23ffffff\" fill-opacity=\"0.4\"><path d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/></g></g></svg>'); background-size: 60px 60px;"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-6 animate-fade-in-down">
                    <svg class="w-5 h-5 text-accent-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                    </svg>
                    <span class="text-sm font-medium">Актуална информация</span>
                </div>
                <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold animate-fade-in-up">
                    <span class="gradient-text">Новини</span>
                </h1>
                <p class="mt-6 text-lg lg:text-xl text-gray-300 leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                    Бъдете информирани за последните събития в бизнес средата
                </p>
            </div>
        </div>

        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-16 lg:h-24" viewBox="0 0 1440 74" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0 24C240 74 480 74 720 49C960 24 1200 24 1440 49V74H0V24Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- News Grid -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if($news->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($news as $index => $item)
                        <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-primary-200 hover-lift animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="relative overflow-hidden">
                                @if($item->image)
                                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-full h-52 object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-52 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:from-primary-50 group-hover:to-accent-50 transition-all duration-500">
                                        <svg class="w-14 h-14 text-gray-300 group-hover:text-primary-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                        </svg>
                                    </div>
                                @endif
                                <!-- Overlay gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-3 text-sm mb-3">
                                    <span class="text-gray-500">{{ $item->published_at?->format('d.m.Y') }}</span>
                                    @if($item->category)
                                        <span class="px-3 py-1 bg-gradient-to-r from-primary-100 to-primary-50 text-primary-700 rounded-full text-xs font-medium">{{ $item->category_label }}</span>
                                    @endif
                                </div>
                                <h2 class="font-heading text-lg font-bold text-primary-900 line-clamp-2 group-hover:text-primary-700 transition-colors">
                                    <a href="{{ route('news.show', $item) }}">
                                        {{ $item->title }}
                                    </a>
                                </h2>
                                <p class="mt-3 text-gray-600 text-sm line-clamp-3 leading-relaxed">{{ $item->excerpt }}</p>
                                <a href="{{ route('news.show', $item) }}" class="mt-5 inline-flex items-center gap-2 text-primary-600 font-semibold text-sm hover:text-primary-700 group/link">
                                    Прочети повече
                                    <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-16">
                    {{ $news->links() }}
                </div>
            @else
                <div class="text-center py-20">
                    <div class="w-24 h-24 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-gray-900">Няма публикувани новини</h3>
                    <p class="mt-2 text-gray-500">Проверете отново по-късно за последни новини</p>
                    <a href="{{ route('home') }}" class="mt-6 inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                        Към началната страница
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-16 lg:py-20 bg-gradient-to-br from-gray-50 to-gray-100/50 overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-72 h-72 bg-primary-100/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-accent-100/50 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-heading text-2xl lg:text-3xl font-bold text-primary-900">
                Искате да получавате <span class="gradient-text">новини</span>?
            </h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                Станете член на БТПП Плевен и получавайте редовна информация за бизнес възможности
            </p>
            <a href="{{ route('contact') }}" class="mt-8 inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold rounded-xl hover:from-primary-700 hover:to-primary-800 transition-all duration-300 shadow-xl shadow-primary-600/20 hover-lift">
                <span>Свържете се с нас</span>
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        </div>
    </section>
</x-layouts.public>
