<div>
    <x-jet-dialog-modal wire:model="showingEvolData" >

        <x-slot name="title">
            <div class="w-full flex justify-center">
                {{ __('Evolution data') }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <div class="w-full flex justify-center">
                    <h1 class="dark:text-gray-200">{{ __('Child: ') }} {{$child_name}}</h1>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4 dark:text-gray-400">
                <div class="w-full flex justify-center dark:text-blue-400">
                    <h2>Date of measurement: {{$evolutionDateCreate}}</h2>
                </div>
                <div class="w-full flex justify-center mt-2">
                    <h2>Growth: {{$evolutionGrowth}}</h2>
                </div>
                <div class="w-full flex justify-center">
                    <h2>Weight: {{$evolutionWeight}}</h2>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="">
                <x-jet-button wire:click="cancelShowingEvolData()" wire:loading.attr="disabled">
                    {{ __('Close')  }}
                </x-jet-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>
</div>
