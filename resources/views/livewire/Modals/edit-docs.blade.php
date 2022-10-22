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

    <x-jet-dialog-modal wire:model="showingEditModal" >

        <x-slot name="title">
{{--            @if($documents_id)--}}
                {{ __('Edit Document') }}
{{--            @endif--}}
        </x-slot>

        <x-slot name="content">

{{--            <div class="col-span-6 sm:col-span-4 mt-3">--}}
{{--                <x-jet-label for="category" value="{{ __('Category') }}" />--}}
{{--                <x-jet-input id="category" type="text" class="mt-1 block w-full" wire:model.defer="category" autocomplete="category" />--}}
{{--                <x-jet-input-error for="category" class="mt-2" />--}}
{{--            </div>--}}
            {{--Select CAtegory--}}
            <div class="col-span-6 sm:col-span-4 mt-3">
{{--                <x-jet-label for="category" value="{{ __('Category') }} : {{$category}}" wire:model="category" />--}}
                <x-jet-label for="category" value="{{ __('Category') }}"/>
                <x-jet-input type="text" class="mt-1 block w-full" list="category-list" wire:model="category" autocomplete="category"/>
                <datalist id="category-list">
                    @foreach($documents as $document)
                        <option>{{value($document->category)}}</option>
                    @endforeach
                </datalist>
                <x-jet-input-error for="category" class="mt-2" />
            </div>
            {{--View Images--}}
            <div class="flex flex-row flex-wrap justify-center mt-3">
{{--                @foreach($imagesChild as $key => $image)--}}
                    @foreach($imagesChild as $image)
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
{{--                                wire:click="showEditImage({{$key}})"--}}
                                src="{{URL::asset('storage/'.$image->path)}}"
                                class="block rounded"
                                width="115px"
                                alt="..."
                            />
                        </div>
                    </div>
                @endforeach
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
