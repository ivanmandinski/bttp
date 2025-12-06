<x-layouts.public :title="$event->title">
    <article>
        <!-- Header -->
        <section class="bg-gradient-to-br from-primary-900 to-primary-800 text-white py-16">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-2 text-sm text-gray-300 mb-4">
                    <a href="{{ route('events.index') }}" class="hover:text-white transition-colors">Събития</a>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                    <span>{{ $event->type_label }}</span>
                </div>
                <h1 class="font-heading text-3xl lg:text-4xl font-bold leading-tight">{{ $event->title }}</h1>
            </div>
        </section>

        <!-- Event Details -->
        <section class="py-12">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        @if($event->image)
                            <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}" class="w-full rounded-xl shadow-lg mb-8">
                        @endif

                        <div class="prose prose-lg max-w-none prose-headings:font-heading prose-headings:text-primary-900 prose-a:text-primary-600">
                            {!! nl2br(e($event->description)) !!}
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1">
                        <div class="bg-gray-50 rounded-xl p-6 sticky top-24">
                            <div class="text-center pb-6 border-b border-gray-200">
                                <div class="text-3xl font-bold text-primary-600">{{ $event->formatted_price }}</div>
                            </div>

                            <div class="py-6 space-y-4">
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-primary-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>
                                    <div>
                                        <div class="font-medium text-gray-900">Дата</div>
                                        <div class="text-gray-600">{{ $event->start_date?->format('d.m.Y') }}</div>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-primary-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <div class="font-medium text-gray-900">Час</div>
                                        <div class="text-gray-600">
                                            {{ $event->start_date?->format('H:i') }}
                                            @if($event->end_date)
                                                - {{ $event->end_date->format('H:i') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @if($event->location)
                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                        <div>
                                            <div class="font-medium text-gray-900">Място</div>
                                            <div class="text-gray-600">{{ $event->location }}</div>
                                        </div>
                                    </div>
                                @endif

                                @if($event->max_participants)
                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                        </svg>
                                        <div>
                                            <div class="font-medium text-gray-900">Участници</div>
                                            <div class="text-gray-600">Макс. {{ $event->max_participants }} души</div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="pt-6 border-t border-gray-200">
                                <a href="{{ route('contact') }}" class="w-full inline-flex justify-center items-center px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition-colors">
                                    Заявете участие
                                </a>
                                <p class="mt-3 text-xs text-gray-500 text-center">
                                    Свържете се с нас за регистрация
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back Link -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <a href="{{ route('events.index') }}" class="inline-flex items-center text-primary-600 font-medium hover:text-primary-700">
                        <svg class="mr-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                        Към всички събития
                    </a>
                </div>
            </div>
        </section>
    </article>

    <!-- Related Events -->
    @if($relatedEvents->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="font-heading text-2xl font-bold text-primary-900">Други предстоящи събития</h2>
                <div class="mt-8 grid md:grid-cols-3 gap-6">
                    @foreach($relatedEvents as $related)
                        <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="bg-primary-100 text-primary-700 rounded-lg px-3 py-2 text-center">
                                    <div class="text-xs font-medium uppercase">{{ $related->start_date?->translatedFormat('M') }}</div>
                                    <div class="text-xl font-bold">{{ $related->start_date?->format('d') }}</div>
                                </div>
                                <div class="flex-1">
                                    <span class="text-sm text-gray-500">{{ $related->start_date?->format('H:i') }}</span>
                                </div>
                            </div>
                            <h3 class="font-heading font-semibold text-primary-900 line-clamp-2">
                                <a href="{{ route('events.show', $related) }}" class="hover:text-primary-600 transition-colors">
                                    {{ $related->title }}
                                </a>
                            </h3>
                            <div class="mt-2 text-accent-600 font-medium text-sm">{{ $related->formatted_price }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.public>
