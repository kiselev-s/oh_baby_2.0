<div>
    <a href="#"
       wire:click.prevent="showModal()"
       type="button"
       class="inline-flex items-center shadow-sm ml-2 p-2 rounded border-gray-300 dark:border-gray-600 border text-indigo-300 dark:text-blue-400 ease-in-out duration-150 hover:text-white dark:hover:text-indigo-900 bg-white dark:bg-gray-700 hover:bg-indigo-500 dark:hover:bg-gray-600 focus:outline-none"
    >
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                  clip-rule="evenodd"/>
        </svg>
    </a>

    <x-jet-dialog-modal wire:model="showingModal" >

        <x-slot name="title">
                {{ __('Create Documents') }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title" autocomplete="title" />
                <x-jet-input-error for="title" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label for="category" value="{{ __('Category') }}" />
                <x-jet-input id="category" type="text" class="mt-1 block w-full" wire:model.defer="category" autocomplete="category" />
                <x-jet-input-error for="category" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <input type="file" class="mt-1 block w-full" wire:model="path">
                <x-jet-input-error for="path" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="footer">
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
        </x-slot>

    </x-jet-dialog-modal>
</div>
