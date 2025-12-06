<x-layouts.public>
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.4\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight">
                        Подкрепяме <span class="text-accent-400">бизнеса</span> в Плевенски регион
                    </h1>
                    <p class="mt-6 text-lg text-gray-300 leading-relaxed">
                        Българска Търговско-Промишлена Палата - Плевен е вашият надежден партньор за развитие на бизнеса.
                        Предлагаме професионални услуги, обучения и възможности за networking.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-accent-400 text-primary-900 font-semibold rounded-lg hover:bg-accent-500 transition-colors">
                            Станете член
                            <svg class="ml-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                        <a href="{{ route('services') }}" class="inline-flex items-center px-6 py-3 border-2 border-white/30 text-white font-semibold rounded-lg hover:bg-white/10 transition-colors">
                            Нашите услуги
                        </a>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                                <div class="text-4xl font-bold text-accent-400">500+</div>
                                <div class="text-gray-300 mt-1">Активни членове</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                                <div class="text-4xl font-bold text-accent-400">30+</div>
                                <div class="text-gray-300 mt-1">Години опит</div>
                            </div>
                        </div>
                        <div class="space-y-4 mt-8">
                            <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                                <div class="text-4xl font-bold text-accent-400">1000+</div>
                                <div class="text-gray-300 mt-1">Издадени сертификати</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                                <div class="text-4xl font-bold text-accent-400">50+</div>
                                <div class="text-gray-300 mt-1">Събития годишно</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-primary-900">Нашите услуги</h2>
                <p class="mt-4 text-lg text-gray-600">Предлагаме широка гама от услуги за подкрепа на вашия бизнес</p>
            </div>

            <div class="mt-12 grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 font-heading text-xl font-semibold text-primary-900">Сертификати за произход</h3>
                    <p class="mt-2 text-gray-600">Издаване на сертификати за произход на стоки за износ и други външнотърговски документи.</p>
                    <a href="{{ route('services') }}" class="mt-4 inline-flex items-center text-primary-600 font-medium hover:text-primary-700">
                        Научете повече
                        <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>

                <!-- Service 2 -->
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-accent-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                        </svg>
                    </div>
                    <h3 class="mt-4 font-heading text-xl font-semibold text-primary-900">Обучения и семинари</h3>
                    <p class="mt-2 text-gray-600">Професионални обучения, семинари и конференции за повишаване на квалификацията.</p>
                    <a href="{{ route('events.index') }}" class="mt-4 inline-flex items-center text-primary-600 font-medium hover:text-primary-700">
                        Вижте събития
                        <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>

                <!-- Service 3 -->
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-success-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-success-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                    </div>
                    <h3 class="mt-4 font-heading text-xl font-semibold text-primary-900">Международни връзки</h3>
                    <p class="mt-2 text-gray-600">Съдействие за установяване на контакти с чуждестранни партньори и пазари.</p>
                    <a href="{{ route('services') }}" class="mt-4 inline-flex items-center text-primary-600 font-medium hover:text-primary-700">
                        Научете повече
                        <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('services') }}" class="inline-flex items-center px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition-colors">
                    Всички услуги
                </a>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end">
                <div>
                    <h2 class="font-heading text-3xl lg:text-4xl font-bold text-primary-900">Последни новини</h2>
                    <p class="mt-2 text-gray-600">Бъдете информирани за последните събития в бизнес средата</p>
                </div>
                <a href="{{ route('news.index') }}" class="hidden sm:inline-flex items-center text-primary-600 font-medium hover:text-primary-700">
                    Всички новини
                    <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </div>

            <div class="mt-8 grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($latestNews as $news)
                    <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        @if($news->image)
                            <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                </svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                <span>{{ $news->published_at?->format('d.m.Y') }}</span>
                                @if($news->category)
                                    <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                    <span>{{ $news->category_label }}</span>
                                @endif
                            </div>
                            <h3 class="font-heading text-lg font-semibold text-primary-900 line-clamp-2">{{ $news->title }}</h3>
                            <p class="mt-2 text-gray-600 text-sm line-clamp-3">{{ $news->excerpt }}</p>
                            <a href="{{ route('news.show', $news) }}" class="mt-4 inline-flex items-center text-primary-600 font-medium text-sm hover:text-primary-700">
                                Прочети повече
                                <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-500">
                        Няма публикувани новини
                    </div>
                @endforelse
            </div>

            <div class="mt-8 text-center sm:hidden">
                <a href="{{ route('news.index') }}" class="inline-flex items-center text-primary-600 font-medium">
                    Всички новини
                    <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section class="py-16 lg:py-24 bg-primary-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end">
                <div>
                    <h2 class="font-heading text-3xl lg:text-4xl font-bold text-primary-900">Предстоящи събития</h2>
                    <p class="mt-2 text-gray-600">Не пропускайте важните събития за вашия бизнес</p>
                </div>
                <a href="{{ route('events.index') }}" class="hidden sm:inline-flex items-center text-primary-600 font-medium hover:text-primary-700">
                    Всички събития
                    <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </div>

            <div class="mt-8 grid md:grid-cols-2 gap-6">
                @forelse($upcomingEvents as $event)
                    <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow flex gap-4">
                        <div class="flex-shrink-0 w-16 text-center">
                            <div class="bg-primary-600 text-white rounded-t-lg py-1 text-xs font-medium uppercase">
                                {{ $event->start_date?->translatedFormat('M') }}
                            </div>
                            <div class="bg-primary-100 text-primary-900 rounded-b-lg py-2 text-2xl font-bold">
                                {{ $event->start_date?->format('d') }}
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-heading text-lg font-semibold text-primary-900">{{ $event->title }}</h3>
                            <div class="mt-2 flex flex-wrap gap-3 text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $event->start_date?->format('H:i') }}
                                </span>
                                @if($event->location)
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                        {{ $event->location }}
                                    </span>
                                @endif
                            </div>
                            <div class="mt-3 flex items-center justify-between">
                                <span class="text-accent-600 font-medium">{{ $event->formatted_price }}</span>
                                <a href="{{ route('events.show', $event) }}" class="text-primary-600 font-medium text-sm hover:text-primary-700">
                                    Детайли &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center py-12 text-gray-500">
                        Няма предстоящи събития
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 lg:py-24 bg-gradient-to-r from-primary-600 to-primary-800 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-heading text-3xl lg:text-4xl font-bold">Станете член на БТПП Плевен</h2>
            <p class="mt-4 text-lg text-primary-100 max-w-2xl mx-auto">
                Присъединете се към над 500 фирми, които се възползват от нашите услуги и възможности за развитие на бизнеса.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-accent-400 text-primary-900 font-semibold rounded-lg hover:bg-accent-500 transition-colors">
                    Свържете се с нас
                </a>
                <a href="{{ route('members.catalog') }}" class="inline-flex items-center px-6 py-3 border-2 border-white/30 text-white font-semibold rounded-lg hover:bg-white/10 transition-colors">
                    Вижте нашите членове
                </a>
            </div>
        </div>
    </section>
</x-layouts.public>
