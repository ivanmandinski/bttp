<!DOCTYPE html>
<html lang="bg" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Българска Търговско-Промишлена Палата - Плевен. Подкрепяме бизнеса в региона.">
    <title>{{ $title ?? 'БТПП Плевен' }} - Българска Търговско-Промишлена Палата</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-white antialiased" x-data="{ scrolled: false }" @scroll.window="scrolled = window.scrollY > 50">
    <!-- Header -->
    <header
        x-data="{ mobileMenuOpen: false }"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
        :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-lg' : 'bg-transparent'"
    >
        <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 justify-between items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 animate-fade-in-left">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                        <div class="bg-gradient-to-br from-primary-600 to-primary-800 text-white font-bold text-xl px-3 py-2 rounded-lg shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-105">
                            БТПП
                        </div>
                        <div class="hidden sm:block">
                            <div class="font-heading font-bold transition-colors duration-300" :class="scrolled ? 'text-primary-900' : 'text-white'">Плевен</div>
                            <div class="text-xs transition-colors duration-300" :class="scrolled ? 'text-gray-500' : 'text-white/70'">Търговско-Промишлена Палата</div>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex lg:items-center lg:gap-x-1 animate-fade-in-down">
                    <a href="{{ route('home') }}" class="relative px-4 py-2 text-sm font-medium transition-all duration-300 rounded-lg group {{ request()->routeIs('home') ? 'text-accent-400' : '' }}" :class="scrolled ? 'text-gray-700 hover:text-primary-600 hover:bg-primary-50' : 'text-white/90 hover:text-white hover:bg-white/10'">
                        Начало
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-accent-400 transition-all duration-300 group-hover:w-1/2 {{ request()->routeIs('home') ? 'w-1/2' : '' }}"></span>
                    </a>
                    <a href="{{ route('about') }}" class="relative px-4 py-2 text-sm font-medium transition-all duration-300 rounded-lg group {{ request()->routeIs('about') ? 'text-accent-400' : '' }}" :class="scrolled ? 'text-gray-700 hover:text-primary-600 hover:bg-primary-50' : 'text-white/90 hover:text-white hover:bg-white/10'">
                        За нас
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-accent-400 transition-all duration-300 group-hover:w-1/2 {{ request()->routeIs('about') ? 'w-1/2' : '' }}"></span>
                    </a>
                    <a href="{{ route('services') }}" class="relative px-4 py-2 text-sm font-medium transition-all duration-300 rounded-lg group {{ request()->routeIs('services') ? 'text-accent-400' : '' }}" :class="scrolled ? 'text-gray-700 hover:text-primary-600 hover:bg-primary-50' : 'text-white/90 hover:text-white hover:bg-white/10'">
                        Услуги
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-accent-400 transition-all duration-300 group-hover:w-1/2 {{ request()->routeIs('services') ? 'w-1/2' : '' }}"></span>
                    </a>
                    <a href="{{ route('news.index') }}" class="relative px-4 py-2 text-sm font-medium transition-all duration-300 rounded-lg group {{ request()->routeIs('news.*') ? 'text-accent-400' : '' }}" :class="scrolled ? 'text-gray-700 hover:text-primary-600 hover:bg-primary-50' : 'text-white/90 hover:text-white hover:bg-white/10'">
                        Новини
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-accent-400 transition-all duration-300 group-hover:w-1/2 {{ request()->routeIs('news.*') ? 'w-1/2' : '' }}"></span>
                    </a>
                    <a href="{{ route('events.index') }}" class="relative px-4 py-2 text-sm font-medium transition-all duration-300 rounded-lg group {{ request()->routeIs('events.*') ? 'text-accent-400' : '' }}" :class="scrolled ? 'text-gray-700 hover:text-primary-600 hover:bg-primary-50' : 'text-white/90 hover:text-white hover:bg-white/10'">
                        Събития
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-accent-400 transition-all duration-300 group-hover:w-1/2 {{ request()->routeIs('events.*') ? 'w-1/2' : '' }}"></span>
                    </a>
                    <a href="{{ route('contact') }}" class="relative px-4 py-2 text-sm font-medium transition-all duration-300 rounded-lg group {{ request()->routeIs('contact') ? 'text-accent-400' : '' }}" :class="scrolled ? 'text-gray-700 hover:text-primary-600 hover:bg-primary-50' : 'text-white/90 hover:text-white hover:bg-white/10'">
                        Контакти
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-accent-400 transition-all duration-300 group-hover:w-1/2 {{ request()->routeIs('contact') ? 'w-1/2' : '' }}"></span>
                    </a>
                </div>

                <!-- CTA Button -->
                <div class="hidden lg:block animate-fade-in-right">
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-accent-400 to-accent-500 text-primary-900 font-semibold text-sm rounded-full hover:from-accent-500 hover:to-accent-600 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5 hover:scale-105">
                        <span>Станете член</span>
                        <svg class="ml-2 w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2 rounded-lg transition-colors" :class="scrolled ? 'text-gray-700 hover:bg-gray-100' : 'text-white hover:bg-white/10'">
                        <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div
                x-show="mobileMenuOpen"
                x-cloak
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-4"
                class="lg:hidden bg-white rounded-2xl shadow-xl mt-2 p-4 border border-gray-100"
            >
                <div class="flex flex-col space-y-1">
                    <a href="{{ route('home') }}" class="px-4 py-3 text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-xl transition-all duration-200 {{ request()->routeIs('home') ? 'bg-primary-50 text-primary-600' : '' }}">Начало</a>
                    <a href="{{ route('about') }}" class="px-4 py-3 text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-xl transition-all duration-200 {{ request()->routeIs('about') ? 'bg-primary-50 text-primary-600' : '' }}">За нас</a>
                    <a href="{{ route('services') }}" class="px-4 py-3 text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-xl transition-all duration-200 {{ request()->routeIs('services') ? 'bg-primary-50 text-primary-600' : '' }}">Услуги</a>
                    <a href="{{ route('news.index') }}" class="px-4 py-3 text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-xl transition-all duration-200 {{ request()->routeIs('news.*') ? 'bg-primary-50 text-primary-600' : '' }}">Новини</a>
                    <a href="{{ route('events.index') }}" class="px-4 py-3 text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-xl transition-all duration-200 {{ request()->routeIs('events.*') ? 'bg-primary-50 text-primary-600' : '' }}">Събития</a>
                    <a href="{{ route('contact') }}" class="px-4 py-3 text-base font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-xl transition-all duration-200 {{ request()->routeIs('contact') ? 'bg-primary-50 text-primary-600' : '' }}">Контакти</a>
                    <div class="pt-2 mt-2 border-t border-gray-100">
                        <a href="{{ route('contact') }}" class="block text-center px-4 py-3 bg-gradient-to-r from-accent-400 to-accent-500 text-primary-900 font-semibold rounded-xl">Станете член</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900 text-white relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-0 w-96 h-96 bg-accent-400 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent-400 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- About -->
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="bg-gradient-to-br from-accent-400 to-accent-500 text-primary-900 font-bold text-lg px-3 py-2 rounded-lg shadow-lg">БТПП</div>
                        <span class="font-heading font-bold text-xl">Плевен</span>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        Българска Търговско-Промишлена Палата - Плевен подкрепя развитието на бизнеса в региона от над 30 години.
                    </p>
                    <!-- Social Links -->
                    <div class="flex gap-3 mt-6">
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center text-white hover:bg-accent-400 hover:text-primary-900 transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center text-white hover:bg-accent-400 hover:text-primary-900 transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-heading font-semibold text-lg mb-6 line-decoration">Бързи връзки</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-all duration-300 hover:translate-x-1 inline-block">За нас</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-all duration-300 hover:translate-x-1 inline-block">Услуги</a></li>
                        <li><a href="{{ route('news.index') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-all duration-300 hover:translate-x-1 inline-block">Новини</a></li>
                        <li><a href="{{ route('events.index') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-all duration-300 hover:translate-x-1 inline-block">Събития</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-all duration-300 hover:translate-x-1 inline-block">Контакти</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h3 class="font-heading font-semibold text-lg mb-6 line-decoration">Услуги</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-all duration-300 hover:translate-x-1 inline-block">Сертификати за произход</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-all duration-300 hover:translate-x-1 inline-block">Бизнес консултации</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-all duration-300 hover:translate-x-1 inline-block">Обучения</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-all duration-300 hover:translate-x-1 inline-block">Международни връзки</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="font-heading font-semibold text-lg mb-6 line-decoration">Контакти</h3>
                    <ul class="space-y-4 text-sm text-gray-300">
                        <li class="flex items-start gap-3 group">
                            <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:bg-accent-400 group-hover:text-primary-900 transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <span>гр. Плевен 5800<br>ул. "Примерна" 1</span>
                        </li>
                        <li class="flex items-center gap-3 group">
                            <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:bg-accent-400 group-hover:text-primary-900 transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                            </div>
                            <span>064 123 456</span>
                        </li>
                        <li class="flex items-center gap-3 group">
                            <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:bg-accent-400 group-hover:text-primary-900 transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <span>info@bttp-pleven.bg</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 mt-12 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} БТПП Плевен. Всички права запазени.</p>
            </div>
        </div>
    </footer>

    @livewireScripts

    <!-- Scroll Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>
