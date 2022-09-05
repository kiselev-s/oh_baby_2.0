{{--<x-slot name="header">--}}
{{--    <h2 class="text-center">Laravel 9 Livewire CRUD Demo</h2>--}}
{{--</x-slot>--}}
{{--<div class="py-12">--}}
{{--    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
        <div class="">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                     role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="flex mr-4 mt-0.5">
                <span class="inline-flex rounded-md">
                    <button wire:click="create()" type="button" class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                        <img src="{{URL::asset('/add_child.png')}}" alt="boy" width="30">
                    </button>
                </span>
            </div>
            @if($isModalOpen)
                @include('livewire.create-child')
            @endif
</div>
