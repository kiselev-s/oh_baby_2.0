<div>
    <x-jet-dialog-modal wire:model="showingEditModal" >

        <x-slot name="title">
            {{ __('Edit Document') }}
        </x-slot>

        <x-slot name="content">

            {{--Select Category--}}
            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-jet-label for="category" value="{{ __('Category') }}"/>
                <x-jet-input type="text" class="mt-1 block w-full" list="category-list" wire:model="category" autocomplete="category"/>
                <datalist id="category-list">
                    @if($documents != null)
                        @foreach($documents as $document)
                            <option>{{value($document->category)}}</option>
                        @endforeach
                    @endif
                </datalist>
                <x-jet-input-error for="category" class="mt-2" />
            </div>
            {{--View Images--}}
            <div class="flex flex-row flex-wrap justify-center mt-3" wire:model="imagesChild">

                @if($imagesChild != null)
                        @foreach($imagesChild as $key => $image)
                        <div class="p-1">
                            <div class="flex absolute px-20">
                                <a
                                    href="#"
                                    class="py-2 px-1 hover:text-red-600 text-gray-400 "
                                    wire:click.prevent="submitDeleteImage({{$image->id}})"
                                >
                                    <svg class="h-7 xl:h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <img
                                    wire:click="showEditImage({{$key}})"
                                    src="{{URL::asset('storage/'.$image->path)}}"
                                    class="block rounded cursor-pointer hover:border hover:border-green-400 dark:hover:border-blue-500"
                                    width="115px"
                                    alt="..."
                                />
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="mr-4">
                <x-jet-button wire:click="saveEditedDocuments()" wire:loading.attr="disabled">
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
