<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Documents') }}
            </h2>
            @include('livewire.child-actions')
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
{{--                <h1>Doc content</h1>--}}
{{--                {{$isModalOpen}}--}}
                <p wire:model="child_name">{{$child_name}}</p>
                <p>---</p>
                <div wire:model="children">
                    @foreach ($children as $child)
                        <div>{{$child->first_name}} - {{$child->selected}}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
