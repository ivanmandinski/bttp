<x-layouts.public :title="$news->title">
    <article>
        <!-- Header -->
        <section class="bg-gradient-to-br from-primary-900 to-primary-800 text-white py-16">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-2 text-sm text-gray-300 mb-4">
                    <a href="{{ route('news.index') }}" class="hover:text-white transition-colors">Новини</a>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                    @if($news->category)
                        <span>{{ $news->category_label }}</span>
                    @endif
                </div>
                <h1 class="font-heading text-3xl lg:text-4xl font-bold leading-tight">{{ $news->title }}</h1>
                <div class="mt-4 flex items-center gap-4 text-gray-300">
                    <span>{{ $news->published_at?->format('d.m.Y') }}</span>
                    @if($news->author)
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            {{ $news->author->name }}
                        </span>
                    @endif
                </div>
            </div>
        </section>

        <!-- Content -->
        <section class="py-12">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
                @if($news->image)
                    <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full rounded-xl shadow-lg mb-8">
                @endif

                @if($news->excerpt)
                    <p class="text-xl text-gray-600 leading-relaxed mb-8 font-medium">
                        {{ $news->excerpt }}
                    </p>
                @endif

                <div class="prose prose-lg max-w-none prose-headings:font-heading prose-headings:text-primary-900 prose-a:text-primary-600">
                    {!! nl2br(e($news->content)) !!}
                </div>

                <!-- Share -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('news.index') }}" class="inline-flex items-center text-primary-600 font-medium hover:text-primary-700">
                            <svg class="mr-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                            Към всички новини
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <!-- Related News -->
    @if($relatedNews->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="font-heading text-2xl font-bold text-primary-900">Свързани новини</h2>
                <div class="mt-8 grid md:grid-cols-3 gap-8">
                    @foreach($relatedNews as $related)
                        <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                            @if($related->image)
                                <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}" class="w-full h-40 object-cover">
                            @else
                                <div class="w-full h-40 bg-gray-100 flex items-center justify-center">
                                    <svg class="w-10 h-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="p-5">
                                <span class="text-sm text-gray-500">{{ $related->published_at?->format('d.m.Y') }}</span>
                                <h3 class="mt-1 font-heading font-semibold text-primary-900 line-clamp-2">
                                    <a href="{{ route('news.show', $related) }}" class="hover:text-primary-600 transition-colors">
                                        {{ $related->title }}
                                    </a>
                                </h3>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.public>
