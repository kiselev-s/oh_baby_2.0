<div class="swiper">
    <div class="flex mb-4 justify-between">
        <div class="">
            <x-jet-secondary-button wire:click="countMinus()" wire:loading.attr="disabled">
                {{ __('Previous')  }}
            </x-jet-secondary-button>
        </div>
        <div class="">
            <x-jet-secondary-button wire:click="countPlus()" wire:loading.attr="disabled">
                {{ __('Next')  }}
            </x-jet-secondary-button>
        </div>
    </div>
    <div class="swiper-wrapper">
        @if($imagesChild)
            <div class="swiper-slide">
                <div class="swiper-zoom-container">
                    <img
                        {{--                class="w-full h-full object-cover"--}}
                        src="{{URL::asset('storage/'.$imagesChild[$count]->path)}}"
                        alt="image of {{$imagesChild[$count]->title}}"
                        {{--                width="100%" height="100%" class="object-cover"--}}
                    >
                </div>
            </div>
        @else
            <div class="flex justify-center">
                <h1>No Image</h1>
            </div>
        @endif
    </div>
    <div class="swiper-button-next">next</div>
    <div class="swiper-button-prev">prev</div>
    <div class="swiper-pagination"></div>
</div>
