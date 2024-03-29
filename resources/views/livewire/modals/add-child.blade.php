<div>
    <a href="#"
       wire:click="showModal()"
       type="button"
       class="inline-flex items-center shadow-sm ml-2 p-2 mr-2 rounded-full border-gray-300 dark:border-gray-900 border text-indigo-300 dark:text-blue-400 ease-in-out duration-150 hover:text-white dark:hover:text-indigo-900 bg-white dark:bg-gray-700 hover:bg-indigo-500 dark:hover:bg-gray-600 focus:outline-none"
    >
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                  clip-rule="evenodd"/>
        </svg>
    </a>

    <x-jet-dialog-modal wire:model="showingModal">

        <x-slot name="title">
            @if($child_id)
                {{ __('Edit Child') }}
            @else
                {{ __('Create Child') }}
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="first_name" autocomplete="first_name" />
                <x-jet-input-error for="first_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="last_name" autocomplete="last_name" />
                <x-jet-input-error for="last_name" class="mt-2" />
            </div>

            <div class="mb-4 flex flex-wrap flex-row justify-between mt-3">
                <div>
                    <x-jet-label for="selectGender" value="{{ __('Gender') }}" />
                    <select wire:model.defer="selectGender" id="gender"
                            class="mt-1 dark:text-gray-400 dark:bg-gray-700 border-gray-300 dark:border-cyan-700 dark:focus:border-cyan-800 focus:border-indigo-300 focus:ring focus:ring-indigo-200 dark:focus:ring-cyan-800 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option
                            selected=""
                        >Choose gender</option>
                        <option value="1">Man</option>
                        <option value="0">Women</option>
                    </select>
                    <x-jet-input-error for="selectGender" class="mt-2" />
                </div>
                <div class="">
                    <x-jet-label for="meeting" value="{{ __('Birthday') }}" />
                    <input id="meeting" wire:model.defer="birthday"
                           type="date"
                           class="mt-1 dark:text-gray-400 dark:bg-gray-700 border-gray-300 dark:border-cyan-700 dark:focus:border-cyan-800 focus:border-indigo-300 focus:ring focus:ring-indigo-200 dark:focus:ring-cyan-800 focus:ring-opacity-50 rounded-md shadow-sm">
                    <x-jet-input-error for="birthday" class="mt-2" />
                </div>
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
