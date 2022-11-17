<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 dark:border-gray-800 leading-tight">
            {{ __('Evolution') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl dark:shadow-emerald-800 sm:rounded-lg p-4">
                @livewire('evolution-charts')
            </div>
        </div>
    </div>
</x-app-layout>

