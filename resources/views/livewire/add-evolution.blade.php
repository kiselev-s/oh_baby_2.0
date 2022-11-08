<div class="flex flex-wrap">
    <div class="flex flex-wrap lg:w-1/2 sm:w-full">
        <div class="mr-4">
            {{'Возраст:'}}
        </div>
        <div>
            <div class="flex items-center ">
                <div class="flex items-center w-1/3">
                    <svg class="h-10 w-10 text-green-400
        {{--            hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-0 active:bg-gray-200--}}
                        hover:text-green-200 hover:cursor-pointer
                        "
                         fill="none" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>

                    <!-- Select  -->
                    <a id="" href="#"
                       class="w-full ml-3 inline-block px-1 py-2 bg-transparent text-gray-700 font-medium text-sm leading-tight transition duration-150 ease-in-out">
                        {{'up to one year'}}
                    </a>
                </div>

                <x-jet-input id="growth" type="text" class="mt-1 block" wire:model.defer="growth" autocomplete="growth" />
                <x-jet-input-error for="growth" class="mt-2" />
            </div>
            <div class="flex items-center">
                <div class="flex items-center w-1/3">
                    <svg class="h-10 w-10 text-gray-300
                        hover:text-green-200 hover:cursor-pointer
                        "
                         fill="none" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>

                    <!-- Select  -->
                    <a id="" href="#"
                       class="w-full ml-3 px-1 py-2 bg-transparent text-gray-700 font-medium text-sm leading-tight transition duration-150 ease-in-out">
                        {{'after one year'}}
                    </a>
                </div>

                <x-jet-input id="growth" type="text" class="mt-1 block" wire:model.defer="growth" autocomplete="growth" />
                <x-jet-input-error for="growth" class="mt-2" />
            </div>
        </div>
    </div>
    <div class="flex flex-wrap lg:w-1/2 sm:w-full">
        <div class="mr-4">
            {{'Параметры:'}}
        </div>
        <div>
            <div class="flex items-center ">
                <div class="flex items-center mr-4">
                    <x-jet-label for="growth" value="{{ __('Growth') }}" />
                </div>

                <x-jet-input id="growth" type="text" class="mt-1 block" wire:model.defer="growth" autocomplete="growth" />
                <x-jet-input-error for="growth" class="mt-2" />
            </div>
            <div class="flex items-center">
                <div class="flex items-center mr-4">
                    <x-jet-label for="weight" value="{{ __('Weight') }}" />
                </div>

                <x-jet-input id="growth" type="text" class="mt-1 block" wire:model.defer="growth" autocomplete="growth" />
                <x-jet-input-error for="growth" class="mt-2" />
            </div>
        </div>
    </div>
</div>

<div class="flex justify-center">
    <div class="mr-4">
        <x-jet-button wire:click="store()" wire:loading.attr="disabled">
            {{ __('Save')  }}
        </x-jet-button>
    </div>
    <div class="">
        <x-jet-secondary-button wire:click="cancel()" wire:loading.attr="disabled">
            {{ __('Cancel')  }}
        </x-jet-secondary-button>
    </div>
</div>
