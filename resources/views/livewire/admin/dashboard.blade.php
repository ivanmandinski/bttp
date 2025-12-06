<div>
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Табло</h1>
        <p class="mt-1 text-sm text-gray-500">Преглед на членството и плащанията за {{ $currentYear }} г.</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Members -->
        <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-lg bg-primary-100 p-3">
                            <svg class="h-6 w-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Общо членове</dt>
                            <dd class="text-2xl font-bold text-gray-900">{{ $totalMembers }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Paid -->
        <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-lg bg-green-100 p-3">
                            <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Платили за {{ $currentYear }}</dt>
                            <dd class="text-2xl font-bold text-green-600">{{ $paidCount }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending -->
        <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-lg bg-yellow-100 p-3">
                            <svg class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Очакващи плащане</dt>
                            <dd class="text-2xl font-bold text-yellow-600">{{ $pendingCount }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue -->
        <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-lg bg-accent-100 p-3">
                            <svg class="h-6 w-6 text-accent-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Приходи {{ $currentYear }}</dt>
                            <dd class="text-2xl font-bold text-gray-900">{{ number_format($totalRevenue, 2) }} лв</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent activity -->
    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Recent Members -->
        <div class="bg-white shadow-sm rounded-xl border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">Последни членове</h3>
            </div>
            <ul class="divide-y divide-gray-100">
                @forelse($recentMembers as $member)
                    <li class="px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-gray-900">{{ $member->company_name }}</p>
                                <p class="text-sm text-gray-500">{{ $member->category?->name ?? 'Без категория' }}</p>
                            </div>
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $member->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $member->status === 'active' ? 'Активен' : 'Неактивен' }}
                            </span>
                        </div>
                    </li>
                @empty
                    <li class="px-6 py-8 text-center text-gray-500">
                        Няма добавени членове
                    </li>
                @endforelse
            </ul>
            <div class="px-6 py-3 border-t border-gray-100">
                <a href="{{ route('admin.members.index') }}" class="text-sm font-medium text-primary-600 hover:text-primary-700">
                    Виж всички →
                </a>
            </div>
        </div>

        <!-- Recent Payments -->
        <div class="bg-white shadow-sm rounded-xl border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">Последни плащания</h3>
            </div>
            <ul class="divide-y divide-gray-100">
                @forelse($recentPayments as $payment)
                    <li class="px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-gray-900">{{ $payment->member->company_name }}</p>
                                <p class="text-sm text-gray-500">{{ $payment->payment_date?->format('d.m.Y') }}</p>
                            </div>
                            <span class="font-semibold text-green-600">
                                {{ number_format($payment->amount, 2) }} лв
                            </span>
                        </div>
                    </li>
                @empty
                    <li class="px-6 py-8 text-center text-gray-500">
                        Няма регистрирани плащания
                    </li>
                @endforelse
            </ul>
            <div class="px-6 py-3 border-t border-gray-100">
                <a href="{{ route('admin.payments.index') }}" class="text-sm font-medium text-primary-600 hover:text-primary-700">
                    Виж всички →
                </a>
            </div>
        </div>
    </div>
</div>
