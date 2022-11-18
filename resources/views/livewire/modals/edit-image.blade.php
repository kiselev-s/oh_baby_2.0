<div>
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
                <select wire:model="category" id="category" class="mt-1 w-full dark:text-gray-400 dark:bg-gray-700 border-gray-300 dark:border-cyan-700 dark:focus:border-cyan-800 focus:border-indigo-300 focus:ring focus:ring-indigo-200 dark:focus:ring-cyan-800 focus:ring-opacity-50 rounded-md shadow-sm">
{{--                    <option selected="">Choose category</option>--}}
                    @if($documents != null)
                        @foreach($documents as $document)
                        <option>{{value($document->category)}}</option>
    {{--                    <option value="0">Women</option>--}}
                        @endforeach
                    @endif
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
