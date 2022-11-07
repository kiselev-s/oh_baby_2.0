<div class="flex">
    <div>
        <div class="flex items-center ">

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
            <a id="" type="button" href="#"
               class="w-full ml-3 inline-block px-1 py-2 bg-transparent text-gray-700 font-medium text-sm leading-tight transition duration-150 ease-in-out"
               wire:click="">
                {{'Month'}}
            </a>
        </div>
        <div class="flex items-center">

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
               class="w-full ml-3 inline-block px-1 py-2 bg-transparent text-gray-700 font-medium text-sm leading-tight transition duration-150 ease-in-out"
               wire:click="">
                {{'Year'}}
            </a>
        </div>
    </div>

    <div class="flex">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="growth" value="{{ __('Growth') }}" />
            <x-jet-input id="growth" type="text" class="mt-1 block" wire:model.defer="growth" autocomplete="growth" />
            <x-jet-input-error for="growth" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="weight" value="{{ __('Weight') }}" />
            <x-jet-input id="weight" type="text" class="mt-1 block" wire:model.defer="weight" autocomplete="weight" />
            <x-jet-input-error for="weight" class="mt-2" />
        </div>
    </div>
</div>

<div class="flex">
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
