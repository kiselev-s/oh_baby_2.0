<div>
{{--    <a href="#"--}}
{{--       wire:click="showEditModal()"--}}
{{--       type="button"--}}
{{--       class="inline-flex items-center shadow-sm ml-2 p-2 rounded border-gray-300 border text-indigo-300 ease-in-out duration-150 hover:text-white bg-white hover:bg-indigo-500 focus:outline-none"--}}
{{--    >--}}
{{--        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">--}}
{{--            <path fill-rule="evenodd"--}}
{{--                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"--}}
{{--                  clip-rule="evenodd"/>--}}
{{--        </svg>--}}
{{--    </a>--}}

    <x-jet-dialog-modal wire:model="showingEditImageModal" >

        <x-slot name="title">
{{--            @if($documents_id)--}}
                {{ __('Edit Image') }}
{{--            @endif--}}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title" autocomplete="title" />
                <x-jet-input-error for="title" class="mt-2" />
            </div>

{{--            <div class="col-span-6 sm:col-span-4 mt-3">--}}
{{--                <x-jet-label for="category" value="{{ __('Category') }}" />--}}
{{--                <x-jet-input id="category" type="text" class="mt-1 block w-full" wire:model.defer="category" autocomplete="category" />--}}
{{--                <x-jet-input-error for="category" class="mt-2" />--}}
{{--            </div>--}}

            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label for="category" value="{{ __('Category') }}" />
                <select wire:model="category" id="category" class="mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
{{--                    <option selected="">Choose category</option>--}}
                    @foreach($documents as $document)
                    <option>{{value($document->category)}}</option>
{{--                    <option value="0">Women</option>--}}
                    @endforeach
                </select>
                <x-jet-input-error for="category" class="mt-2" />
            </div>

            <div class="flex flex-row flex-wrap mt-3" wire:model="countMax">
                <div class="p-1">
                    @if($this->image_id != -1 && $this->image_id <= $countMax-1)
                        <img
                             src="{{URL::asset('storage/'.$imagesChild[$this->image_id]->path)}}"
                             class="block rounded"
                             width="650px"
                             alt="..."
                        />
                    @endif
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            @if($this->image_id != -1 && $this->image_id <= $countMax-1)
                <div class="mr-4">
                    <x-jet-danger-button wire:click="submitDeleteImage({{$imagesChild[$this->image_id]->id}})" wire:loading.attr="disabled">
                        {{ __('Delete')  }}
                    </x-jet-danger-button>
                </div>
                <div class="mr-4">
                    <x-jet-button wire:click="saveEditedImage({{$imagesChild[$this->image_id]->id}})" wire:loading.attr="disabled">
                        {{ __('Save')  }}
                    </x-jet-button>
                </div>
            @endif
            <div class="">
                <x-jet-secondary-button wire:click="cancelEditImage()" wire:loading.attr="disabled">
                    {{ __('Cancel')  }}
                </x-jet-secondary-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>
</div>
