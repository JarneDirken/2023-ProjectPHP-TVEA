<div x-data="{ show: false }">
    @props(['maxWidth'])

    @php
        $maxWidth = [
            'sm' => 'sm:max-w-sm',
            'md' => 'sm:max-w-md',
            'lg' => 'sm:max-w-lg',
            'xl' => 'sm:max-w-xl',
            '2xl' => 'sm:max-w-2xl',
        ][$maxWidth ?? '2xl'];
    @endphp

    <div
        x-on:close.stop="show = false"
        x-on:keydown.escape.window="show = false"
        x-show="show"
        class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
        style="display: none;"
    >
        <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div x-show="show" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto"
             x-trap.inert.noscroll="show"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <div class="px-6 py-4">
                <div class="text-2xl font-medium text-gray-900">
                    {{ $title ?? "Info" }}
                </div>

                <div class="mt-4 text-sm text-gray-800">
                    {{ $content ?? "content slot" }}
                </div>
            </div>

            <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                <x-button x-on:click="show = false">Sluiten</x-button>
            </div>
        </div>
    </div>

    <button class="fixed bottom-2 left-2 text-lg rounded-full bg-white border-2 z-50"
            x-on:click="show = ! show">
        <x-phosphor-info class="w-16 h-16 text-green-400" data-tippy-content="Info"></x-phosphor-info>
    </button>

</div>
