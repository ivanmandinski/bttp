<x-layouts.public title="Събития">
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>
                    <span class="text-sm font-medium">Обучения и семинари</span>
                </div>
                <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold animate-fade-in-up">
                    <span class="gradient-text">Събития</span>
                </h1>
                <p class="mt-6 text-lg lg:text-xl text-gray-300 leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                    Не пропускайте важните събития за вашия бизнес
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

    <!-- Upcoming Events -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg shadow-green-500/20">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>
                </div>
                <h2 class="font-heading text-2xl lg:text-3xl font-bold text-primary-900">
                    Предстоящи <span class="gradient-text">събития</span>
                </h2>
            </div>

            @if($upcomingEvents->count() > 0)
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach($upcomingEvents as $index => $event)
                        <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-2xl hover:border-primary-200 transition-all duration-500 hover-lift animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="flex">
                                <!-- Date Card -->
                                <div class="flex-shrink-0 w-28 bg-gradient-to-br from-primary-600 to-primary-700 text-white text-center py-6 flex flex-col justify-center relative overflow-hidden">
                                    <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="relative">
                                        <div class="text-sm font-medium uppercase tracking-wide opacity-80">{{ $event->start_date?->translatedFormat('M') }}</div>
                                        <div class="text-4xl font-bold my-1">{{ $event->start_date?->format('d') }}</div>
                                        <div class="text-sm opacity-80">{{ $event->start_date?->format('Y') }}</div>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1 p-6">
                                    <div class="flex items-start justify-between gap-4">
                                        <div>
                                            <span class="inline-block px-3 py-1 bg-gradient-to-r from-primary-100 to-primary-50 text-primary-700 text-xs font-semibold rounded-full mb-3">
                                                {{ $event->type_label }}
                                            </span>
                                            <h3 class="font-heading text-lg font-bold text-primary-900 group-hover:text-primary-700 transition-colors">
                                                <a href="{{ route('events.show', $event) }}">
                                                    {{ $event->title }}
                                                </a>
                                            </h3>
                                        </div>
                                        <span class="px-3 py-1 bg-accent-100 text-accent-700 font-bold text-sm rounded-lg whitespace-nowrap">
                                            {{ $event->formatted_price }}
                                        </span>
                                    </div>

                                    <div class="mt-4 flex flex-wrap gap-4 text-sm text-gray-500">
                                        <span class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-primary-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $event->start_date?->format('H:i') }}
                                            @if($event->end_date)
                                                - {{ $event->end_date->format('H:i') }}
                                            @endif
                                        </span>
                                        @if($event->location)
                                            <span class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-primary-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                </svg>
                                                {{ $event->location }}
                                            </span>
                                        @endif
                                    </div>

                                    @if($event->description)
                                        <p class="mt-4 text-gray-600 text-sm line-clamp-2 leading-relaxed">{{ Str::limit(strip_tags($event->description), 150) }}</p>
                                    @endif

                                    <a href="{{ route('events.show', $event) }}" class="mt-5 inline-flex items-center gap-2 text-primary-600 font-semibold text-sm hover:text-primary-700 group/link">
                                        Научете повече
                                        <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-16">
                    {{ $upcomingEvents->links() }}
                </div>
            @else
                <div class="text-center py-20 bg-gradient-to-br from-gray-50 to-gray-100/50 rounded-2xl">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-gray-900">Няма предстоящи събития</h3>
                    <p class="mt-2 text-gray-500">Проверете отново по-късно за нови събития</p>
                    <a href="{{ route('contact') }}" class="mt-6 inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors">
                        Свържете се с нас
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Past Events -->
    @if($pastEvents->count() > 0)
        <section class="py-16 lg:py-24 bg-gradient-to-br from-gray-50 to-gray-100/50 relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-72 h-72 bg-primary-100/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-3 mb-10">
                    <div class="w-12 h-12 bg-gradient-to-br from-gray-400 to-gray-500 rounded-xl flex items-center justify-center shadow-lg shadow-gray-400/20">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="font-heading text-2xl lg:text-3xl font-bold text-primary-900">Минали събития</h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($pastEvents as $index => $event)
                        <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl hover:border-gray-200 transition-all duration-300 animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-gray-100 rounded-xl flex flex-col items-center justify-center group-hover:bg-primary-50 transition-colors">
                                    <span class="text-xs font-medium text-gray-500 uppercase">{{ $event->start_date?->translatedFormat('M') }}</span>
                                    <span class="text-lg font-bold text-gray-700">{{ $event->start_date?->format('d') }}</span>
                                </div>
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">{{ $event->type_label }}</span>
                            </div>
                            <h3 class="font-heading font-bold text-primary-900 line-clamp-2 group-hover:text-primary-700 transition-colors">
                                {{ $event->title }}
                            </h3>
                            @if($event->location)
                                <p class="mt-2 text-sm text-gray-500 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    {{ $event->location }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <section class="relative py-16 lg:py-20 bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900 text-white overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-accent-400/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-0 right-1/4 w-72 h-72 bg-primary-600/20 rounded-full blur-3xl animate-float" style="animation-delay: 3s;"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-heading text-2xl lg:text-3xl font-bold">
                Искате да организирате <span class="gradient-text">събитие</span>?
            </h2>
            <p class="mt-4 text-primary-200 max-w-2xl mx-auto">
                Свържете се с нас за организиране на бизнес събития, обучения или семинари
            </p>
            <a href="{{ route('contact') }}" class="mt-8 inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-accent-400 to-accent-500 text-primary-900 font-bold rounded-xl hover:from-accent-500 hover:to-accent-600 transition-all duration-300 shadow-xl shadow-accent-500/30 hover-lift hover-glow">
                <span>Свържете се с нас</span>
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        </div>
    </section>
</x-layouts.public>
