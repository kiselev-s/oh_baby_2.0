<div>
    <x-jet-dialog-modal wire:model="showingVisitDocs" >

        <x-slot name="title">
            <div class="w-full flex justify-center">
                {{ __('Visit doctor statistics') }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <div class="w-full flex justify-center">
                    <h1 class="dark:text-gray-200">{{ __('Child: ') }} {{$child_name}}</h1>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                @if($healths != null && $showingVisitDocs)
                    @foreach($healths as $health)
                        <div class="w-full flex justify-center">
                            <li >
                                {{$health->meeting}} - {{$health->specialization}}
                            </li>
                        </div>
                    @endforeach
                @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="">
                <x-jet-button wire:click="cancelViewVisitDocs()" wire:loading.attr="disabled">
                    {{ __('Close')  }}
                </x-jet-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>
</div>
