{{--<div class="w-1/2 p-4 border-amber-400 border-2 rounded-md flex justify-items-center flex-col">--}}
<div class="w-1/2 p-4 flex justify-items-center flex-col">
    <div class="flex mb-4 justify-between">
        <div class="">
            <x-jet-secondary-button wire:click="countMinus()" wire:loading.attr="disabled">
                {{ __('Previous')  }}
            </x-jet-secondary-button>
        </div>
        <a
            href="#"
            class="py-2 px-1 hover:text-blue-600 text-gray-400"
            wire:click.prevent="edit({{1}})"
        >
            <svg class="h-7 xl:h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
        </a>
        <a
            href="#"
            class="py-2 px-1 hover:text-red-600 text-gray-400"
            wire:click.prevent="submitDelete({{1}})"
        >
            <svg class="h-7 xl:h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </a>
        @if($imagesChild)
            <h1>{{$imagesChild[$count]->title}}</h1>
        @else
            <h1>Not Category</h1>
        @endif
        <div class="">
            <x-jet-secondary-button wire:click="countPlus()" wire:loading.attr="disabled">
                {{ __('Next')  }}
            </x-jet-secondary-button>
        </div>
    </div>
    <div class="flex justify-center">
{{--        <div>--}}
{{--            <h1>document_id = {{$documents_id}}</h1>--}}
{{--            <h1>document_id = {{$test_documents_id}}</h1>--}}
{{--            <h1>child_id = {{$child_id}}</h1>--}}
{{--            <h1>imagesChild = {{$imagesChild}}</h1>--}}
{{--        </div>--}}
{{--        <h1>{{$imagesChild}}</h1>--}}
{{--        <h1>{{$test_image}}</h1>--}}
{{--        <h1>{{$test_image}}</h1>--}}
        @if($imagesChild)
            <img
{{--                class="w-full h-full object-cover"--}}
                src="{{URL::asset('storage/'.$imagesChild[$count]->path)}}"
                alt="image of {{$imagesChild[$count]->title}}"
{{--                width="100%" height="100%" class="object-cover"--}}
            >
        @else
            <div class="flex justify-center">
                <h1>No Image</h1>
            </div>
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
