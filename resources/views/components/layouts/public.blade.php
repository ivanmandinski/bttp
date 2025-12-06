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
<body class="bg-white">
    <!-- Header -->
    <header x-data="{ mobileMenuOpen: false }" class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 justify-between items-center">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="bg-primary-600 text-white font-bold text-xl px-3 py-2 rounded">БТПП</div>
                        <div class="hidden sm:block">
                            <div class="font-heading font-bold text-primary-900">Плевен</div>
                            <div class="text-xs text-gray-500">Търговско-Промишлена Палата</div>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex lg:items-center lg:gap-x-8">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-gray-700 hover:text-primary-600 transition-colors {{ request()->routeIs('home') ? 'text-primary-600' : '' }}">Начало</a>
                    <a href="{{ route('about') }}" class="text-sm font-medium text-gray-700 hover:text-primary-600 transition-colors {{ request()->routeIs('about') ? 'text-primary-600' : '' }}">За нас</a>
                    <a href="{{ route('services') }}" class="text-sm font-medium text-gray-700 hover:text-primary-600 transition-colors {{ request()->routeIs('services') ? 'text-primary-600' : '' }}">Услуги</a>
                    <a href="{{ route('news.index') }}" class="text-sm font-medium text-gray-700 hover:text-primary-600 transition-colors {{ request()->routeIs('news.*') ? 'text-primary-600' : '' }}">Новини</a>
                    <a href="{{ route('events.index') }}" class="text-sm font-medium text-gray-700 hover:text-primary-600 transition-colors {{ request()->routeIs('events.*') ? 'text-primary-600' : '' }}">Събития</a>
                    <a href="{{ route('members.catalog') }}" class="text-sm font-medium text-gray-700 hover:text-primary-600 transition-colors {{ request()->routeIs('members.*') ? 'text-primary-600' : '' }}">Членове</a>
                    <a href="{{ route('contact') }}" class="text-sm font-medium text-gray-700 hover:text-primary-600 transition-colors {{ request()->routeIs('contact') ? 'text-primary-600' : '' }}">Контакти</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden lg:block">
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-4 py-2 bg-accent-400 text-primary-900 font-medium text-sm rounded-lg hover:bg-accent-500 transition-colors">
                        Станете член
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2 text-gray-700">
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
            <div x-show="mobileMenuOpen" x-cloak x-transition class="lg:hidden pb-4">
                <div class="flex flex-col space-y-2">
                    <a href="{{ route('home') }}" class="px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 rounded-lg">Начало</a>
                    <a href="{{ route('about') }}" class="px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 rounded-lg">За нас</a>
                    <a href="{{ route('services') }}" class="px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 rounded-lg">Услуги</a>
                    <a href="{{ route('news.index') }}" class="px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 rounded-lg">Новини</a>
                    <a href="{{ route('events.index') }}" class="px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 rounded-lg">Събития</a>
                    <a href="{{ route('members.catalog') }}" class="px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 rounded-lg">Членове</a>
                    <a href="{{ route('contact') }}" class="px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 rounded-lg">Контакти</a>
                    <a href="{{ route('contact') }}" class="mx-3 mt-2 text-center px-4 py-2 bg-accent-400 text-primary-900 font-medium rounded-lg">Станете член</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-primary-900 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- About -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-accent-400 text-primary-900 font-bold text-lg px-2 py-1 rounded">БТПП</div>
                        <span class="font-heading font-bold">Плевен</span>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        Българска Търговско-Промишлена Палата - Плевен подкрепя развитието на бизнеса в региона от над 30 години.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-heading font-semibold text-lg mb-4">Бързи връзки</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-colors">За нас</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-colors">Услуги</a></li>
                        <li><a href="{{ route('members.catalog') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-colors">Членове</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-colors">Контакти</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h3 class="font-heading font-semibold text-lg mb-4">Услуги</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-colors">Сертификати за произход</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-colors">Бизнес консултации</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-colors">Обучения</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-accent-400 text-sm transition-colors">Международни връзки</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="font-heading font-semibold text-lg mb-4">Контакти</h3>
                    <ul class="space-y-3 text-sm text-gray-300">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-accent-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <span>гр. Плевен, ул. "Примерна" 1</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-accent-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                            <span>064 123 456</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-accent-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            <span>info@bttp-pleven.bg</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-primary-800 mt-8 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} БТПП Плевен. Всички права запазени.</p>
                <div class="flex items-center gap-4">
                    <a href="#" class="text-gray-400 hover:text-accent-400 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent-400 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
