<x-layouts.public>
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900 text-white overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-72 h-72 bg-accent-400/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-accent-400/10 rounded-full blur-3xl"></div>
        </div>

        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.4\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-32 lg:py-40">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <div class="animate-fade-in-up">
                        <span class="inline-flex items-center px-4 py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium text-accent-300 border border-white/20 mb-6">
                            <span class="w-2 h-2 bg-accent-400 rounded-full mr-2 animate-pulse"></span>
                            Над 30 години в подкрепа на бизнеса
                        </span>
                    </div>

                    <h1 class="font-heading text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold leading-tight animate-fade-in-up" style="animation-delay: 0.1s;">
                        Подкрепяме <br>
                        <span class="gradient-text">бизнеса</span> в <br>
                        Плевенски регион
                    </h1>

                    <p class="mt-6 text-lg lg:text-xl text-gray-300 leading-relaxed max-w-xl animate-fade-in-up" style="animation-delay: 0.2s;">
                        Българска Търговско-Промишлена Палата - Плевен е вашият надежден партньор за развитие на бизнеса. Предлагаме професионални услуги, обучения и възможности за networking.
                    </p>

                    <div class="mt-10 flex flex-wrap gap-4 animate-fade-in-up" style="animation-delay: 0.3s;">
                        <a href="{{ route('contact') }}" class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-accent-400 to-accent-500 text-primary-900 font-bold rounded-full hover:from-accent-500 hover:to-accent-600 transition-all duration-300 shadow-lg shadow-accent-400/30 hover:shadow-xl hover:shadow-accent-400/40 hover:-translate-y-1">
                            Станете член
                            <svg class="ml-2 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                        <a href="{{ route('services') }}" class="group inline-flex items-center px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300 hover:-translate-y-1">
                            Нашите услуги
                            <svg class="ml-2 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="hidden lg:block animate-fade-in-right" style="animation-delay: 0.4s;">
                    <div class="grid grid-cols-2 gap-5">
                        <div class="space-y-5">
                            <div class="glass rounded-2xl p-6 hover-lift hover-glow">
                                <div class="text-5xl font-bold gradient-text">500+</div>
                                <div class="text-gray-300 mt-2 font-medium">Активни членове</div>
                            </div>
                            <div class="glass rounded-2xl p-6 hover-lift hover-glow" style="animation-delay: 0.2s;">
                                <div class="text-5xl font-bold gradient-text">30+</div>
                                <div class="text-gray-300 mt-2 font-medium">Години опит</div>
                            </div>
                        </div>
                        <div class="space-y-5 mt-10">
                            <div class="glass rounded-2xl p-6 hover-lift hover-glow" style="animation-delay: 0.3s;">
                                <div class="text-5xl font-bold gradient-text">1000+</div>
                                <div class="text-gray-300 mt-2 font-medium">Сертификати годишно</div>
                            </div>
                            <div class="glass rounded-2xl p-6 hover-lift hover-glow" style="animation-delay: 0.4s;">
                                <div class="text-5xl font-bold gradient-text">50+</div>
                                <div class="text-gray-300 mt-2 font-medium">Събития годишно</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <a href="#services" class="flex flex-col items-center text-white/60 hover:text-white transition-colors">
                <span class="text-sm mb-2">Разгледайте</span>
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 lg:py-32 bg-gray-50 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-100 rounded-full blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4 animate-fade-in-up">Какво предлагаме</span>
                <h2 class="font-heading text-3xl lg:text-5xl font-bold text-primary-900 line-decoration-center animate-fade-in-up" style="animation-delay: 0.1s;">Нашите услуги</h2>
                <p class="mt-6 text-lg text-gray-600 animate-fade-in-up" style="animation-delay: 0.2s;">Предлагаме широка гама от услуги за подкрепа на вашия бизнес</p>
            </div>

            <div class="mt-16 grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center shadow-lg shadow-primary-500/30 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                    </div>
                    <h3 class="mt-6 font-heading text-xl font-bold text-primary-900">Сертификати за произход</h3>
                    <p class="mt-3 text-gray-600 leading-relaxed">Издаване на сертификати за произход на стоки за износ и други външнотърговски документи.</p>
                    <a href="{{ route('services') }}" class="mt-6 inline-flex items-center text-primary-600 font-semibold group-hover:text-accent-500 transition-colors">
                        Научете повече
                        <svg class="ml-2 w-4 h-4 transition-transform duration-300 group-hover:translate-x-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>

                <!-- Service 2 -->
                <div class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-br from-accent-400 to-accent-500 rounded-2xl flex items-center justify-center shadow-lg shadow-accent-400/30 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-primary-900" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                        </svg>
                    </div>
                    <h3 class="mt-6 font-heading text-xl font-bold text-primary-900">Обучения и семинари</h3>
                    <p class="mt-3 text-gray-600 leading-relaxed">Професионални обучения, семинари и конференции за повишаване на квалификацията.</p>
                    <a href="{{ route('events.index') }}" class="mt-6 inline-flex items-center text-primary-600 font-semibold group-hover:text-accent-500 transition-colors">
                        Вижте събития
                        <svg class="ml-2 w-4 h-4 transition-transform duration-300 group-hover:translate-x-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>

                <!-- Service 3 -->
                <div class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-br from-success-500 to-success-600 rounded-2xl flex items-center justify-center shadow-lg shadow-success-500/30 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                    </div>
                    <h3 class="mt-6 font-heading text-xl font-bold text-primary-900">Международни връзки</h3>
                    <p class="mt-3 text-gray-600 leading-relaxed">Съдействие за установяване на контакти с чуждестранни партньори и пазари.</p>
                    <a href="{{ route('services') }}" class="mt-6 inline-flex items-center text-primary-600 font-semibold group-hover:text-accent-500 transition-colors">
                        Научете повече
                        <svg class="ml-2 w-4 h-4 transition-transform duration-300 group-hover:translate-x-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="mt-16 text-center">
                <a href="{{ route('services') }}" class="group inline-flex items-center px-8 py-4 bg-primary-600 text-white font-semibold rounded-full hover:bg-primary-700 transition-all duration-300 shadow-lg shadow-primary-600/30 hover:shadow-xl hover:-translate-y-1">
                    Всички услуги
                    <svg class="ml-2 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="py-24 lg:py-32 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                <div>
                    <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">Актуално</span>
                    <h2 class="font-heading text-3xl lg:text-5xl font-bold text-primary-900 line-decoration">Последни новини</h2>
                    <p class="mt-4 text-lg text-gray-600">Бъдете информирани за последните събития в бизнес средата</p>
                </div>
                <a href="{{ route('news.index') }}" class="hidden sm:inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-full hover:bg-gray-200 transition-all duration-300 group">
                    Всички новини
                    <svg class="ml-2 w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div class="mt-12 grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($latestNews as $index => $news)
                    <article class="group bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100" style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="relative overflow-hidden">
                            @if($news->image)
                                <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <div class="w-full h-56 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 text-sm text-gray-500 mb-3">
                                <span class="font-medium">{{ $news->published_at?->format('d.m.Y') }}</span>
                                @if($news->category)
                                    <span class="w-1.5 h-1.5 bg-accent-400 rounded-full"></span>
                                    <span class="px-2.5 py-0.5 bg-primary-50 text-primary-600 rounded-full text-xs font-semibold">{{ $news->category_label }}</span>
                                @endif
                            </div>
                            <h3 class="font-heading text-xl font-bold text-primary-900 line-clamp-2 group-hover:text-primary-600 transition-colors">{{ $news->title }}</h3>
                            <p class="mt-3 text-gray-600 line-clamp-3">{{ $news->excerpt }}</p>
                            <a href="{{ route('news.show', $news) }}" class="mt-5 inline-flex items-center text-primary-600 font-semibold group-hover:text-accent-500 transition-colors">
                                Прочети повече
                                <svg class="ml-2 w-4 h-4 transition-transform duration-300 group-hover:translate-x-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-16">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                            </svg>
                        </div>
                        <p class="text-gray-500 text-lg">Няма публикувани новини</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-10 text-center sm:hidden">
                <a href="{{ route('news.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-full">
                    Всички новини
                    <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section class="py-24 lg:py-32 bg-gradient-to-br from-primary-50 to-white relative overflow-hidden">
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-accent-100 rounded-full blur-3xl opacity-50 translate-y-1/2 -translate-x-1/2"></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                <div>
                    <span class="inline-block px-4 py-1.5 bg-accent-100 text-accent-700 rounded-full text-sm font-semibold mb-4">Календар</span>
                    <h2 class="font-heading text-3xl lg:text-5xl font-bold text-primary-900 line-decoration">Предстоящи събития</h2>
                    <p class="mt-4 text-lg text-gray-600">Не пропускайте важните събития за вашия бизнес</p>
                </div>
                <a href="{{ route('events.index') }}" class="hidden sm:inline-flex items-center px-6 py-3 bg-white text-gray-700 font-semibold rounded-full hover:bg-gray-50 transition-all duration-300 shadow-sm group">
                    Всички събития
                    <svg class="ml-2 w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div class="mt-12 grid md:grid-cols-2 gap-6">
                @forelse($upcomingEvents as $index => $event)
                    <div class="group bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 flex gap-5" style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="flex-shrink-0">
                            <div class="w-20 text-center overflow-hidden rounded-xl shadow-lg group-hover:scale-105 transition-transform duration-300">
                                <div class="bg-gradient-to-r from-primary-600 to-primary-700 text-white py-2 text-sm font-bold uppercase tracking-wider">
                                    {{ $event->start_date?->translatedFormat('M') }}
                                </div>
                                <div class="bg-white text-primary-900 py-3 text-3xl font-bold border-x border-b border-gray-100">
                                    {{ $event->start_date?->format('d') }}
                                </div>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-heading text-xl font-bold text-primary-900 group-hover:text-primary-600 transition-colors">{{ $event->title }}</h3>
                            <div class="mt-3 flex flex-wrap gap-4 text-sm text-gray-500">
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-primary-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $event->start_date?->format('H:i') }}
                                </span>
                                @if($event->location)
                                    <span class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-primary-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                        {{ $event->location }}
                                    </span>
                                @endif
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="px-3 py-1 bg-accent-100 text-accent-700 rounded-full font-bold text-sm">{{ $event->formatted_price }}</span>
                                <a href="{{ route('events.show', $event) }}" class="inline-flex items-center text-primary-600 font-semibold text-sm group-hover:text-accent-500 transition-colors">
                                    Детайли
                                    <svg class="ml-1 w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center py-16">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                        </div>
                        <p class="text-gray-500 text-lg">Няма предстоящи събития</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 lg:py-32 relative overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900"></div>

        <!-- Animated Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-accent-400/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-primary-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="font-heading text-4xl lg:text-6xl font-bold">Станете член на<br><span class="gradient-text">БТПП Плевен</span></h2>
            <p class="mt-6 text-xl text-gray-300 max-w-2xl mx-auto">
                Присъединете се към над 500 фирми, които се възползват от нашите услуги и възможности за развитие на бизнеса.
            </p>
            <div class="mt-10">
                <a href="{{ route('contact') }}" class="group inline-flex items-center px-10 py-5 bg-gradient-to-r from-accent-400 to-accent-500 text-primary-900 font-bold text-lg rounded-full hover:from-accent-500 hover:to-accent-600 transition-all duration-300 shadow-lg shadow-accent-400/30 hover:shadow-xl hover:shadow-accent-400/40 hover:-translate-y-1 animate-pulse-glow">
                    Свържете се с нас
                    <svg class="ml-3 w-6 h-6 transition-transform duration-300 group-hover:translate-x-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
</x-layouts.public>
