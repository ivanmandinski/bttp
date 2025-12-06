<div>
    <div class="sm:flex sm:items-center sm:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Събития</h1>
            <p class="mt-1 text-sm text-gray-500">Управление на събитията</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <button wire:click="openModal()" class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-primary-700 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Ново събитие
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
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Заглавие..." class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Статус</label>
                <select wire:model.live="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    <option value="">Всички</option>
                    <option value="draft">Чернова</option>
                    <option value="published">Публикувано</option>
                    <option value="cancelled">Отменено</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Тип</label>
                <select wire:model.live="type" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    <option value="">Всички</option>
                    @foreach($types as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Събитие</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Тип</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Цена</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($events as $event)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($event->image)
                                    <img src="{{ Storage::url($event->image) }}" alt="" class="w-10 h-10 rounded object-cover mr-3">
                                @else
                                    <div class="w-10 h-10 rounded bg-gray-200 mr-3 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <div class="font-medium text-gray-900">{{ $event->title }}</div>
                                    <div class="text-sm text-gray-500">{{ $event->location ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $event->type_label ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $event->start_date?->format('d.m.Y H:i') ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $event->formatted_price }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium
                                {{ $event->status === 'published' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $event->status === 'draft' ? 'bg-gray-100 text-gray-800' : '' }}
                                {{ $event->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ $event->status === 'published' ? 'Публикувано' : ($event->status === 'cancelled' ? 'Отменено' : 'Чернова') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            @if($event->status === 'draft')
                                <button wire:click="publish({{ $event->id }})" class="text-green-600 hover:text-green-900 mr-3">Публикувай</button>
                            @endif
                            @if($event->status !== 'cancelled')
                                <button wire:click="openModal({{ $event->id }})" class="text-primary-600 hover:text-primary-900 mr-3">Редактирай</button>
                                <button wire:click="cancel({{ $event->id }})" wire:confirm="Сигурни ли сте, че искате да отмените това събитие?" class="text-yellow-600 hover:text-yellow-900 mr-3">Отмени</button>
                            @endif
                            <button wire:click="delete({{ $event->id }})" wire:confirm="Сигурни ли сте, че искате да изтриете това събитие?" class="text-red-600 hover:text-red-900">Изтрий</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            Няма намерени събития
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($events->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $events->links() }}
            </div>
        @endif
    </div>

    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 overflow-y-auto" wire:click.self="closeModal">
            <div class="bg-white rounded-xl shadow-xl max-w-3xl w-full mx-4 my-8">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ $editingId ? 'Редактиране на събитие' : 'Ново събитие' }}
                    </h3>
                </div>

                <form wire:submit="save">
                    <div class="px-6 py-4 space-y-4 max-h-[70vh] overflow-y-auto">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Заглавие *</label>
                            <input wire:model.live.debounce.300ms="title" type="text" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                            @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Slug *</label>
                            <input wire:model="slug" type="text" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                            @error('slug') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Тип</label>
                                <select wire:model="event_type" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                    <option value="">Без тип</option>
                                    @foreach($types as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Статус</label>
                                <select wire:model="event_status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                    <option value="draft">Чернова</option>
                                    <option value="published">Публикувано</option>
                                    <option value="cancelled">Отменено</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Начало *</label>
                                <input wire:model="start_date" type="datetime-local" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                @error('start_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Край</label>
                                <input wire:model="end_date" type="datetime-local" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                @error('end_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Локация</label>
                            <input wire:model="location" type="text" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500" placeholder="Адрес или описание на мястото">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Макс. участници</label>
                                <input wire:model="max_participants" type="number" min="1" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500" placeholder="Оставете празно за без лимит">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Цена (лв.)</label>
                                <input wire:model="price" type="number" step="0.01" min="0" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500" placeholder="0 за безплатно">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Изображение</label>
                            <div class="flex items-center gap-4">
                                @if($existing_image)
                                    <div class="relative">
                                        <img src="{{ Storage::url($existing_image) }}" alt="" class="w-20 h-20 object-cover rounded">
                                        <button type="button" wire:click="removeImage" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                @elseif($image)
                                    <div class="relative">
                                        <img src="{{ $image->temporaryUrl() }}" alt="" class="w-20 h-20 object-cover rounded">
                                        <button type="button" wire:click="$set('image', null)" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                                <input wire:model="image" type="file" accept="image/*" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                            </div>
                            @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Описание</label>
                            <textarea wire:model="description" rows="5" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500"></textarea>
                            @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
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
