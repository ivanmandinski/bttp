<div>
    <div class="sm:flex sm:items-center sm:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Плащания</h1>
            <p class="mt-1 text-sm text-gray-500">Управление на членски внос</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <button wire:click="openModal()" class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-primary-700 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Добави плащане
            </button>
        </div>
    </div>

    @if(session('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Търсене по фирма</label>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Име на фирма..." class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Статус</label>
                <select wire:model.live="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    <option value="">Всички</option>
                    <option value="pending">Очаквани</option>
                    <option value="paid">Платени</option>
                    <option value="overdue">Просрочени</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Година</label>
                <select wire:model.live="year" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    @foreach($years as $y)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Фирма</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Година</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Сума</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата на плащане</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($payments as $payment)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">{{ $payment->member->company_name }}</div>
                            <div class="text-sm text-gray-500">{{ $payment->member->eik }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $payment->year }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ number_format($payment->amount, 2) }} лв.
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium
                                {{ $payment->status === 'paid' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $payment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $payment->status === 'overdue' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ $payment->status === 'paid' ? 'Платено' : ($payment->status === 'pending' ? 'Очаква се' : 'Просрочено') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $payment->payment_date?->format('d.m.Y') ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            @if($payment->status !== 'paid')
                                <button wire:click="markAsPaid({{ $payment->id }})" class="text-green-600 hover:text-green-900 mr-3">Отбележи като платено</button>
                            @endif
                            <button wire:click="openModal({{ $payment->id }})" class="text-primary-600 hover:text-primary-900">Редактирай</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            Няма намерени плащания
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($payments->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $payments->links() }}
            </div>
        @endif
    </div>

    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50" wire:click.self="closeModal">
            <div class="bg-white rounded-xl shadow-xl max-w-lg w-full mx-4">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ $editingId ? 'Редактиране на плащане' : 'Добавяне на плащане' }}
                    </h3>
                </div>

                <form wire:submit="save">
                    <div class="px-6 py-4 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Член</label>
                            <select wire:model="member_id" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500" {{ $editingId ? 'disabled' : '' }}>
                                <option value="">Изберете член</option>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->company_name }} ({{ $member->eik }})</option>
                                @endforeach
                            </select>
                            @error('member_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Сума (лв.)</label>
                                <input wire:model="amount" type="number" step="0.01" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                @error('amount') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Година</label>
                                <select wire:model="payment_year" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                    @foreach($years as $y)
                                        <option value="{{ $y }}">{{ $y }}</option>
                                    @endforeach
                                </select>
                                @error('payment_year') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Статус</label>
                            <select wire:model="payment_status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                <option value="pending">Очаква се</option>
                                <option value="paid">Платено</option>
                                <option value="overdue">Просрочено</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Дата на плащане</label>
                                <input wire:model="payment_date" type="date" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Метод на плащане</label>
                                <select wire:model="payment_method" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                    <option value="">Не е посочен</option>
                                    <option value="bank_transfer">Банков превод</option>
                                    <option value="cash">В брой</option>
                                    <option value="card">С карта</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 flex justify-end gap-3 rounded-b-xl">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                            Отказ
                        </button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-lg hover:bg-primary-700">
                            {{ $editingId ? 'Запази' : 'Добави' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
