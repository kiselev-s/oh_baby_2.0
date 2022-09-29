<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documents') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
{{--                <h1>Doc content</h1>--}}
{{--                @livewire('documents-view')--}}
                <div class="flex flex-wrap">
                    <div class="w-1/2 p-4">
                        @livewire('documents-table')
                    </div>
                    <div class="w-1/2 p-4">
                        @livewire('documents-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
