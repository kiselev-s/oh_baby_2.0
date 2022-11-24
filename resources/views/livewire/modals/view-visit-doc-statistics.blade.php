<div>
    <x-jet-dialog-modal wire:model="showingVisitDocs" >

        <x-slot name="title">
                {{ __('Visit doctor statistics') }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="title" value="{{ __('Child:') }} {{$child_name}}" />
{{--                <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title" autocomplete="title" />--}}
{{--                <x-jet-input-error for="title" class="mt-2" />--}}
            </div>
            <div class="col-span-6 sm:col-span-4">
                @if($healths != null && $showingVisitDocs)
                @foreach($healths as $health)
                    <li>{{$health->meeting}}</li>
                @endforeach
                @endif
            </div>

        </x-slot>

        <x-slot name="footer">
{{--            @if($this->image_id != -1 && $this->image_id <= $countMax-1)--}}
{{--                <div class="mr-4">--}}
{{--                    <x-jet-danger-button wire:click="submitDeleteImage({{$imagesChild[$this->image_id]->id}})" wire:loading.attr="disabled">--}}
{{--                        {{ __('Delete')  }}--}}
{{--                    </x-jet-danger-button>--}}
{{--                </div>--}}
{{--                <div class="mr-4">--}}
{{--                    <x-jet-button wire:click="saveEditedImage({{$imagesChild[$this->image_id]->id}})" wire:loading.attr="disabled">--}}
{{--                        {{ __('Save')  }}--}}
{{--                    </x-jet-button>--}}
{{--                </div>--}}
{{--            @endif--}}
            <div class="">
                <x-jet-secondary-button wire:click="cancelViewVisitDocs()" wire:loading.attr="disabled">
                    {{ __('OK')  }}
                </x-jet-secondary-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>
</div>
