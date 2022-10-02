<div class="w-1/2 p-4 border-amber-400 border-2 rounded-md flex justify-items-center flex-col">
    <div class="flex mb-4 justify-between">
        <div class="">
            <x-jet-secondary-button wire:click="countMinus()" wire:loading.attr="disabled">
                {{ __('Previous')  }}
            </x-jet-secondary-button>
        </div>
        @if($imagesChild)
            <h1>{{$imagesChild[$count]->title}}</h1>
        @endif
        <div class="">
            <x-jet-secondary-button wire:click="countPlus()" wire:loading.attr="disabled">
                {{ __('Next')  }}
            </x-jet-secondary-button>
        </div>
    </div>
    <div>
        @if($imagesChild)
            <img
                src="{{URL::asset('storage/'.$imagesChild[$count]->path)}}"
                alt="girl"
                width="100%" height="100%" class="object-contain"
            >
        @endif
    </div>
{{--    <div class="flex mt-4 justify-between">--}}
{{--        <div class="">--}}
{{--            <x-jet-secondary-button wire:click="countMinus()" wire:loading.attr="disabled">--}}
{{--                {{ __('Previous')  }}--}}
{{--            </x-jet-secondary-button>--}}
{{--        </div>--}}
{{--        <div class="">--}}
{{--            <x-jet-secondary-button wire:click="countPlus()" wire:loading.attr="disabled">--}}
{{--                {{ __('Next')  }}--}}
{{--            </x-jet-secondary-button>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
