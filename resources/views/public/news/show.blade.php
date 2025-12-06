<x-layouts.public :title="$news->title">
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
                    <a href="{{ route('news.index') }}" class="hover:text-white transition-colors">Новини</a>
                    @if($news->category)
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                        <span class="text-accent-400">{{ $news->category_label }}</span>
                    @endif
                </nav>

                <h1 class="font-heading text-3xl md:text-4xl lg:text-5xl font-bold leading-tight animate-fade-in-up">{{ $news->title }}</h1>

                <div class="mt-6 flex flex-wrap items-center gap-4 text-gray-300 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                        {{ $news->published_at?->format('d.m.Y') }}
                    </span>
                    @if($news->author)
                        <span class="w-1 h-1 bg-gray-500 rounded-full"></span>
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            {{ $news->author->name }}
                        </span>
                    @endif
                    @if($news->category)
                        <span class="w-1 h-1 bg-gray-500 rounded-full"></span>
                        <span class="px-3 py-1 bg-accent-400/20 text-accent-300 rounded-full text-sm font-medium">
                            {{ $news->category_label }}
                        </span>
                    @endif
                </div>
            </div>

            <!-- Wave Divider -->
            <div class="absolute bottom-0 left-0 right-0">
                <svg class="w-full h-12 lg:h-20" viewBox="0 0 1440 74" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path d="M0 24C240 74 480 74 720 49C960 24 1200 24 1440 49V74H0V24Z" fill="white"/>
                </svg>
            </div>
        </section>

        <!-- Content -->
        <section class="py-12 lg:py-16 bg-white">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
                @if($news->image)
                    <div class="mb-10 animate-fade-in-up">
                        <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full rounded-2xl shadow-2xl">
                    </div>
                @endif

                @if($news->excerpt)
                    <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed mb-10 font-medium border-l-4 border-accent-400 pl-6 animate-fade-in-up" style="animation-delay: 0.1s;">
                        {{ $news->excerpt }}
                    </p>
                @endif

                <div class="prose prose-lg lg:prose-xl max-w-none prose-headings:font-heading prose-headings:text-primary-900 prose-a:text-primary-600 prose-a:no-underline hover:prose-a:underline animate-fade-in-up" style="animation-delay: 0.2s;">
                    {!! nl2br(e($news->content)) !!}
                </div>

                <!-- Actions -->
                <div class="mt-12 pt-8 border-t border-gray-200 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-colors group">
                            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                            Към всички новини
                        </a>

                        <div class="flex items-center gap-3">
                            <span class="text-sm text-gray-500">Споделете:</span>
                            <a href="#" class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-blue-100 text-blue-700 rounded-lg flex items-center justify-center hover:bg-blue-700 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <!-- Related News -->
    @if($relatedNews->count() > 0)
        <section class="py-16 lg:py-24 bg-gradient-to-br from-gray-50 to-gray-100/50 relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-72 h-72 bg-primary-100/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="font-heading text-2xl lg:text-3xl font-bold text-primary-900">
                        Свързани <span class="gradient-text">новини</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedNews as $index => $related)
                        <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-primary-200 hover-lift animate-on-scroll" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="relative overflow-hidden">
                                @if($related->image)
                                    <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}" class="w-full h-44 object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-44 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:from-primary-50 group-hover:to-accent-50 transition-all duration-500">
                                        <svg class="w-12 h-12 text-gray-300 group-hover:text-primary-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5">
                                <span class="text-sm text-gray-500">{{ $related->published_at?->format('d.m.Y') }}</span>
                                <h3 class="mt-2 font-heading font-bold text-primary-900 line-clamp-2 group-hover:text-primary-700 transition-colors">
                                    <a href="{{ route('news.show', $related) }}">
                                        {{ $related->title }}
                                    </a>
                                </h3>
                                <a href="{{ route('news.show', $related) }}" class="mt-4 inline-flex items-center gap-2 text-primary-600 font-semibold text-sm hover:text-primary-700 group/link">
                                    Прочети
                                    <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.public>
