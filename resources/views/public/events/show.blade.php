<x-layouts.public :title="$event->title">
    <article>
        <!-- Hero Header -->
        <section class="relative bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900 text-white pt-20 overflow-hidden">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0">
                <div class="absolute top-20 left-10 w-72 h-72 bg-accent-400/10 rounded-full blur-3xl animate-float"></div>
                <div class="absolute bottom-10 right-10 w-96 h-96 bg-primary-600/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
            </div>

            <div class="relative mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
                <!-- Breadcrumb -->
                <nav class="flex items-center gap-2 text-sm text-gray-300 mb-6 animate-fade-in-down">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Начало</a>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                    <a href="{{ route('events.index') }}" class="hover:text-white transition-colors">Събития</a>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                    <span class="text-accent-400">{{ $event->type_label }}</span>
                </nav>

                <span class="inline-block px-4 py-1.5 bg-accent-400/20 text-accent-300 text-sm font-semibold rounded-full mb-4 animate-fade-in-up">
                    {{ $event->type_label }}
                </span>

                <h1 class="font-heading text-3xl md:text-4xl lg:text-5xl font-bold leading-tight animate-fade-in-up" style="animation-delay: 0.1s;">
                    {{ $event->title }}
                </h1>
            </div>

            <!-- Wave Divider -->
            <div class="absolute bottom-0 left-0 right-0">
                <svg class="w-full h-12 lg:h-20" viewBox="0 0 1440 74" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path d="M0 24C240 74 480 74 720 49C960 24 1200 24 1440 49V74H0V24Z" fill="white"/>
                </svg>
            </div>
        </section>

        <!-- Event Details -->
        <section class="py-12 lg:py-16 bg-white">
            <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-3 gap-10">
                    <!-- Main Content -->
                    <div class="lg:col-span-2 animate-fade-in-up">
                        @if($event->image)
                            <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}" class="w-full rounded-2xl shadow-2xl mb-10">
                        @endif

                        <div class="prose prose-lg lg:prose-xl max-w-none prose-headings:font-heading prose-headings:text-primary-900 prose-a:text-primary-600 prose-a:no-underline hover:prose-a:underline">
                            {!! nl2br(e($event->description)) !!}
                        </div>

                        <!-- Back Link -->
                        <div class="mt-12 pt-8 border-t border-gray-200">
                            <a href="{{ route('events.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-colors group">
                                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>
                                Към всички събития
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1 animate-fade-in-up" style="animation-delay: 0.2s;">
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100/50 rounded-2xl p-6 lg:p-8 sticky top-24 shadow-lg border border-gray-100">
                            <!-- Price -->
                            <div class="text-center pb-6 border-b border-gray-200">
                                <span class="text-sm text-gray-500 font-medium">Цена</span>
                                <div class="text-4xl font-bold gradient-text mt-1">{{ $event->formatted_price }}</div>
                            </div>

                            <!-- Details -->
                            <div class="py-6 space-y-5">
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-primary-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">Дата</div>
                                        <div class="text-gray-600">{{ $event->start_date?->format('d.m.Y') }}</div>
                                    </div>
                                </div>

                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 bg-accent-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-accent-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">Час</div>
                                        <div class="text-gray-600">
                                            {{ $event->start_date?->format('H:i') }}
                                            @if($event->end_date)
                                                - {{ $event->end_date->format('H:i') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @if($event->location)
                                    <div class="flex items-start gap-4">
                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900">Място</div>
                                            <div class="text-gray-600">{{ $event->location }}</div>
                                        </div>
                                    </div>
                                @endif

                                @if($event->max_participants)
                                    <div class="flex items-start gap-4">
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900">Участници</div>
                                            <div class="text-gray-600">Макс. {{ $event->max_participants }} души</div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- CTA -->
                            <div class="pt-6 border-t border-gray-200">
                                <a href="{{ route('contact') }}" class="group w-full inline-flex justify-center items-center gap-2 px-6 py-4 bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold rounded-xl hover:from-primary-700 hover:to-primary-800 transition-all duration-300 shadow-lg shadow-primary-600/30 hover-lift">
                                    <span>Заявете участие</span>
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </a>
                                <p class="mt-4 text-xs text-gray-500 text-center">
                                    Свържете се с нас за регистрация
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <!-- Related Events -->
    @if($relatedEvents->count() > 0)
        <section class="py-16 lg:py-24 bg-gradient-to-br from-gray-50 to-gray-100/50 relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-72 h-72 bg-primary-100/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="font-heading text-2xl lg:text-3xl font-bold text-primary-900">
                        Други предстоящи <span class="gradient-text">събития</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedEvents as $index => $related)
                        <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-2xl hover:border-primary-200 transition-all duration-500 hover-lift animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-600 text-white rounded-xl flex flex-col items-center justify-center shadow-lg shadow-primary-500/20 group-hover:scale-110 transition-transform">
                                    <span class="text-xs font-medium uppercase opacity-80">{{ $related->start_date?->translatedFormat('M') }}</span>
                                    <span class="text-2xl font-bold">{{ $related->start_date?->format('d') }}</span>
                                </div>
                                <div class="flex-1">
                                    <span class="text-sm text-gray-500">{{ $related->start_date?->format('H:i') }}</span>
                                    <span class="block px-2 py-0.5 bg-primary-100 text-primary-700 text-xs font-medium rounded-full w-fit mt-1">
                                        {{ $related->type_label }}
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-heading font-bold text-primary-900 line-clamp-2 group-hover:text-primary-700 transition-colors">
                                <a href="{{ route('events.show', $related) }}">
                                    {{ $related->title }}
                                </a>
                            </h3>
                            <div class="mt-3 flex items-center justify-between">
                                <span class="text-accent-600 font-bold">{{ $related->formatted_price }}</span>
                                <a href="{{ route('events.show', $related) }}" class="text-primary-600 font-semibold text-sm hover:text-primary-700 inline-flex items-center gap-1 group/link">
                                    Детайли
                                    <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.public>
