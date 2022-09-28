<div class="">
    <div class="flex mr-4 mt-0.5">
        <span class="inline-flex rounded-md">
            <button wire:click="create()" type="button" class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                <img src="{{URL::asset('/add_child.png')}}" alt="boy" width="30">
            </button>
        </span>
    </div>
{{--            @if($isModalOpen)--}}
{{--                @include('livewire.create-child')--}}
{{--            @endif--}}
    @includeWhen($isModalOpen, 'livewire.create-child')
</div>
