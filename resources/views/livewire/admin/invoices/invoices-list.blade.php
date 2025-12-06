<div>
    <div class="sm:flex sm:items-center sm:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Фактури</h1>
            <p class="mt-1 text-sm text-gray-500">Управление на фактурите</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <button wire:click="openModal()" class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-primary-700 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Нова фактура
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
                <label class="block text-sm font-medium text-gray-700 mb-1">Търсене</label>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Номер, клиент, ЕИК..." class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Статус</label>
                <select wire:model.live="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    <option value="">Всички</option>
                    <option value="draft">Чернова</option>
                    <option value="issued">Издадена</option>
                    <option value="paid">Платена</option>
                    <option value="cancelled">Анулирана</option>
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Номер</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Клиент</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Сума</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($invoices as $invoice)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">{{ $invoice->invoice_number }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">{{ $invoice->client_name ?? '-' }}</div>
                            <div class="text-sm text-gray-500">{{ $invoice->client_eik ?? '' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $invoice->issue_date->format('d.m.Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ number_format($invoice->total, 2) }} лв.
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium
                                {{ $invoice->status === 'paid' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $invoice->status === 'issued' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $invoice->status === 'draft' ? 'bg-gray-100 text-gray-800' : '' }}
                                {{ $invoice->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ $invoice->status_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            @if($invoice->status === 'issued')
                                <button wire:click="markAsPaid({{ $invoice->id }})" class="text-green-600 hover:text-green-900 mr-3">Платена</button>
                            @endif
                            @if($invoice->status !== 'cancelled')
                                <button wire:click="openModal({{ $invoice->id }})" class="text-primary-600 hover:text-primary-900 mr-3">Редактирай</button>
                                <button wire:click="cancelInvoice({{ $invoice->id }})" wire:confirm="Сигурни ли сте, че искате да анулирате тази фактура?" class="text-red-600 hover:text-red-900">Анулирай</button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            Няма намерени фактури
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($invoices->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $invoices->links() }}
            </div>
        @endif
    </div>

    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 overflow-y-auto" wire:click.self="closeModal">
            <div class="bg-white rounded-xl shadow-xl max-w-3xl w-full mx-4 my-8">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ $editingId ? 'Редактиране на фактура' : 'Нова фактура' }}
                    </h3>
                </div>

                <form wire:submit="save">
                    <div class="px-6 py-4 space-y-4 max-h-[70vh] overflow-y-auto">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Клиент (член)</label>
                                <div class="flex gap-2">
                                    <select wire:model="member_id" wire:change="prefillFromMember" class="flex-1 rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                        <option value="">Изберете клиент</option>
                                        @foreach($members as $member)
                                            <option value="{{ $member->id }}">{{ $member->company_name }} ({{ $member->eik }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Дата на издаване</label>
                                <input wire:model="issue_date" type="date" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                @error('issue_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Дата на падеж</label>
                                <input wire:model="due_date" type="date" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Статус</label>
                                <select wire:model="invoice_status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                    <option value="draft">Чернова</option>
                                    <option value="issued">Издадена</option>
                                    <option value="paid">Платена</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Начин на плащане</label>
                                <select wire:model="payment_method" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                    <option value="">Не е посочен</option>
                                    <option value="bank_transfer">Банков превод</option>
                                    <option value="cash">В брой</option>
                                    <option value="card">С карта</option>
                                </select>
                            </div>
                        </div>

                        <!-- Items -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <label class="block text-sm font-medium text-gray-700">Редове</label>
                                <button type="button" wire:click="addItem" class="text-sm text-primary-600 hover:text-primary-900">+ Добави ред</button>
                            </div>

                            <div class="space-y-2">
                                @foreach($items as $index => $item)
                                    <div class="flex gap-2 items-start" wire:key="item-{{ $index }}">
                                        <div class="flex-1">
                                            <input wire:model="items.{{ $index }}.description" type="text" placeholder="Описание" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                            @error("items.{$index}.description") <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                        </div>
                                        <div class="w-20">
                                            <input wire:model.live="items.{{ $index }}.quantity" type="number" step="0.01" min="0.01" placeholder="К-во" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                        </div>
                                        <div class="w-28">
                                            <input wire:model.live="items.{{ $index }}.unit_price" type="number" step="0.01" min="0" placeholder="Ед. цена" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                        </div>
                                        <div class="w-24 text-right text-sm text-gray-700 pt-2">
                                            {{ number_format(($item['quantity'] ?? 0) * ($item['unit_price'] ?? 0), 2) }} лв.
                                        </div>
                                        @if(count($items) > 1)
                                            <button type="button" wire:click="removeItem({{ $index }})" class="text-red-500 hover:text-red-700 p-2">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        @else
                                            <div class="w-9"></div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Totals -->
                        <div class="border-t pt-4">
                            <div class="flex justify-end">
                                <div class="w-64 space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Сума без ДДС:</span>
                                        <span class="font-medium">{{ number_format($this->subtotal, 2) }} лв.</span>
                                    </div>
                                    <div class="flex justify-between text-sm items-center">
                                        <span class="text-gray-600">ДДС ({{ $vat_rate }}%):</span>
                                        <span class="font-medium">{{ number_format($this->vatAmount, 2) }} лв.</span>
                                    </div>
                                    <div class="flex justify-between text-base border-t pt-2">
                                        <span class="font-semibold">Общо:</span>
                                        <span class="font-bold text-primary-600">{{ number_format($this->total, 2) }} лв.</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Бележки</label>
                            <textarea wire:model="notes" rows="2" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm"></textarea>
                        </div>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 flex justify-end gap-3 rounded-b-xl">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                            Отказ
                        </button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-lg hover:bg-primary-700">
                            {{ $editingId ? 'Запази' : 'Създай' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
