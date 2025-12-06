<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Страницата не е намерена | БТПП Плевен</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900 min-h-screen flex items-center justify-center relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-72 h-72 bg-accent-400/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-primary-600/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-accent-400/5 rounded-full blur-3xl"></div>
    </div>

    <!-- Decorative Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"><g fill=\"none\" fill-rule=\"evenodd\"><g fill=\"%23ffffff\" fill-opacity=\"0.4\"><path d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/></g></g></svg>'); background-size: 60px 60px;"></div>
    </div>

    <div class="relative text-center px-4 animate-fade-in-up">
        <!-- 404 Number -->
        <div class="relative inline-block mb-8">
            <span class="text-[150px] md:text-[200px] font-heading font-bold text-white/10 leading-none">404</span>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-32 h-32 md:w-40 md:h-40 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/20 shadow-2xl">
                    <svg class="w-16 h-16 md:w-20 md:h-20 text-accent-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Content -->
        <h1 class="font-heading text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
            Страницата не е <span class="gradient-text">намерена</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-10 max-w-lg mx-auto">
            Страницата, която търсите, не съществува или е преместена на друг адрес.
        </p>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ url('/') }}" class="group inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-accent-400 to-accent-500 text-primary-900 font-bold rounded-xl hover:from-accent-500 hover:to-accent-600 transition-all duration-300 shadow-xl shadow-accent-500/30 hover-lift hover-glow">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Към началото</span>
            </a>
            <a href="{{ url('/contact') }}" class="group inline-flex items-center gap-3 px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-bold rounded-xl hover:bg-white/20 transition-all duration-300 border border-white/20">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                </svg>
                <span>Свържете се с нас</span>
            </a>
        </div>

        <!-- Quick Links -->
        <div class="mt-16 pt-8 border-t border-white/10">
            <p class="text-gray-400 text-sm mb-4">Полезни връзки:</p>
            <div class="flex flex-wrap items-center justify-center gap-4 md:gap-8">
                <a href="{{ url('/about') }}" class="text-gray-300 hover:text-accent-400 transition-colors text-sm font-medium">За нас</a>
                <a href="{{ url('/services') }}" class="text-gray-300 hover:text-accent-400 transition-colors text-sm font-medium">Услуги</a>
                <a href="{{ url('/news') }}" class="text-gray-300 hover:text-accent-400 transition-colors text-sm font-medium">Новини</a>
                <a href="{{ url('/events') }}" class="text-gray-300 hover:text-accent-400 transition-colors text-sm font-medium">Събития</a>
            </div>
        </div>
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(3deg); }
        }
        .animate-float { animation: float 8s ease-in-out infinite; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.6s ease-out forwards; }

        .gradient-text {
            background: linear-gradient(135deg, #D4A537 0%, #eac463 50%, #D4A537 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hover-lift:hover {
            transform: translateY(-4px);
        }

        .hover-glow:hover {
            box-shadow: 0 0 30px rgba(212, 165, 55, 0.4);
        }
    </style>
</body>
</html>
