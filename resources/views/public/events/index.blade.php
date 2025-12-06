<x-layouts.public title="Събития">
    <!-- Hero -->
    <section class="bg-gradient-to-br from-primary-900 to-primary-800 text-white py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-4xl lg:text-5xl font-bold">Събития</h1>
            <p class="mt-4 text-lg text-gray-300">
                Не пропускайте важните събития за вашия бизнес
            </p>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section class="py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="font-heading text-2xl font-bold text-primary-900 mb-8">Предстоящи събития</h2>

            @if($upcomingEvents->count() > 0)
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach($upcomingEvents as $event)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                            <div class="flex">
                                <!-- Date Card -->
                                <div class="flex-shrink-0 w-24 bg-primary-600 text-white text-center py-4">
                                    <div class="text-sm font-medium uppercase">{{ $event->start_date?->translatedFormat('M') }}</div>
                                    <div class="text-3xl font-bold">{{ $event->start_date?->format('d') }}</div>
                                    <div class="text-sm">{{ $event->start_date?->format('Y') }}</div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1 p-6">
                                    <div class="flex items-start justify-between gap-4">
                                        <div>
                                            <span class="inline-block px-2 py-1 bg-primary-100 text-primary-700 text-xs font-medium rounded-full mb-2">
                                                {{ $event->type_label }}
                                            </span>
                                            <h3 class="font-heading text-lg font-semibold text-primary-900">
                                                <a href="{{ route('events.show', $event) }}" class="hover:text-primary-600 transition-colors">
                                                    {{ $event->title }}
                                                </a>
                                            </h3>
                                        </div>
                                        <span class="text-accent-600 font-semibold whitespace-nowrap">{{ $event->formatted_price }}</span>
                                    </div>

                                    <div class="mt-3 flex flex-wrap gap-4 text-sm text-gray-500">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $event->start_date?->format('H:i') }}
                                            @if($event->end_date)
                                                - {{ $event->end_date->format('H:i') }}
                                            @endif
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

                                    @if($event->description)
                                        <p class="mt-3 text-gray-600 text-sm line-clamp-2">{{ Str::limit($event->description, 150) }}</p>
                                    @endif

                                    <a href="{{ route('events.show', $event) }}" class="mt-4 inline-flex items-center text-primary-600 font-medium text-sm hover:text-primary-700">
                                        Научете повече
                                        <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $upcomingEvents->links() }}
                </div>
            @else
                <div class="text-center py-16 bg-gray-50 rounded-xl">
                    <svg class="w-16 h-16 text-gray-300 mx-auto" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Няма предстоящи събития</h3>
                    <p class="mt-2 text-gray-500">Проверете отново по-късно за нови събития</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Past Events -->
    @if($pastEvents->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="font-heading text-2xl font-bold text-primary-900 mb-8">Минали събития</h2>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($pastEvents as $event)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 opacity-75 hover:opacity-100 transition-opacity">
                            <span class="text-sm text-gray-500">{{ $event->start_date?->format('d.m.Y') }}</span>
                            <h3 class="mt-2 font-heading font-semibold text-primary-900 line-clamp-2">{{ $event->title }}</h3>
                            <span class="inline-block mt-2 px-2 py-0.5 bg-gray-100 text-gray-600 text-xs rounded-full">{{ $event->type_label }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.public>
