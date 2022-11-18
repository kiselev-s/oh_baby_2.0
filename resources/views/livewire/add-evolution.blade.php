<div class="flex flex-wrap">

{{--    <div class="flex flex-wrap lg:w-1/2 sm:w-full">--}}
    <div class="flex flex-wrap justify-center w-full lg:justify-start lg:w-1/2">
{{--        <x-jet-label for="" value="{{$afterYear ? 'true' : 'false'}}" />--}}
{{--        <x-jet-label for="" value="{{$selectAge}}" />--}}
{{--        {{$evolution}}--}}
        <div class="mr-4 dark:text-gray-400">
            {{'Age:'}}
        </div>
        <div>
            <div class="flex items-center">
                <div class="flex items-center py-2 w-1/3">
                    <svg class="h-10 w-10
        {{--            hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-0 active:bg-gray-200--}}
{{--                        hover:text-green-200 hover:cursor-pointer--}}
                        {{ !$afterYear ? ' text-gray-300 hover:text-green-200 hover:cursor-pointer' : ' text-green-400' }}
                        "
                         wire:click="{{ !$afterYear ? 'changeAge()' : '' }}"
                         fill="none" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>

                    <!-- Select  -->
                    <a id="" href="#"
                       class="w-full ml-3 inline-block px-1 py-2 bg-transparent text-gray-700 dark:text-gray-300 font-medium text-sm leading-tight transition duration-150 ease-in-out focus:outline-none disabled">
                        {{'month'}}
                    </a>
                </div>

{{--                <x-jet-input id="growth" type="text" class="mt-1 block" wire:model.defer="growth" autocomplete="growth"/>--}}
                <select id="age" class="mt-1 w-7/12 dark:text-gray-400 dark:bg-gray-700 border-gray-300 dark:border-cyan-700 dark:focus:border-cyan-800 focus:ring focus:ring-indigo-200 dark:focus:ring-cyan-800 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="selectAge"
                    {{ $afterYear ? '' : 'disabled' }}
                >
                    <option selected="">Choose month</option>
                        @foreach($month as $m)
                            <option>{{value($m)}}</option>
                            {{--                    <option value="0">Women</option>--}}
                        @endforeach
                </select>
                <x-jet-input-error for="selectAge" class="mt-2" />
            </div>
            <div class="flex items-center">
                <div class="flex items-center w-1/3">
                    <svg class="h-10 w-10
                        {{ $afterYear ? ' text-gray-300 hover:text-green-200 hover:cursor-pointer' : ' text-green-400' }}
                        "
                         wire:click="{{ !$afterYear ? '' : 'changeAge()' }}"
                         fill="none" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>

                    <!-- Select  -->
                    <a id="" href="#"
                       class="w-full ml-3 px-1 py-2 bg-transparent text-gray-700 dark:text-gray-300 font-medium text-sm leading-tight transition duration-150 ease-in-out focus:outline-none">
                        {{'year'}}
                    </a>
                </div>

                <x-jet-input id="inputAge" type="text" class="mt-1 w-7/12 block" autocomplete="inputAge"
                     disabled="{{$afterYear ? true : false}}"
                     wire:model.defer="inputAge"
                />
                <x-jet-input-error for="inputAge" class="mt-2" />
            </div>
        </div>
    </div>
    <div class="flex flex-wrap justify-center w-full lg:justify-start lg:w-auto lg:w-1/2">
        <div class="mr-4 dark:text-gray-400">
            {{'Values:'}}
        </div>
        <div>
            <div class="flex items-center py-1">
                <div class="flex items-center mr-4">
                    <x-jet-label for="growth" value="{{ __('Growth') }}" />
                </div>

                <x-jet-input id="growth" type="text" class="mt-1 w-10/12 block" wire:model.defer="growth" autocomplete="growth" />
                <x-jet-input-error for="growth" class="mt-2" />
            </div>
            <div class="flex items-center">
                <div class="flex items-center mr-4">
                    <x-jet-label for="weight" value="{{ __('Weight') }}" />
                </div>

                <x-jet-input id="weight" type="text" class="mt-1 w-10/12 block" wire:model.defer="weight" autocomplete="weight" />
                <x-jet-input-error for="weight" class="mt-2" />
            </div>
        </div>
    </div>
</div>

<div class="flex justify-center">
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
