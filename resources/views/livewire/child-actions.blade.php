@if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
    <div class="flex">

        @include('theme-button')

        @include('livewire.modals.add-child')
            <div>
            @if($team_id)
                <div class="flex mt-0.5">

                    <!-- Icon Child gender -->
                    @if($gender)
                        <img src="{{URL::asset('/boy.png')}}" alt="boy" width="30">
                    @else
                        <img src="{{URL::asset('/girl.png')}}" alt="girl" width="30">
                    @endif

                    <div class="ml-1 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <!-- Current Child -->
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 hover:text-gray-700 dark:hover:text-gray-400 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{$child_name}}
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Child Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Child') }}
                                    </div>

                                    <!-- All Child -->
                                    @foreach ($children as $child)
                                        <div
                                            class="flex items-center hover:bg-gray-100 dark:hover:bg-gray-900 focus:bg-gray-100 dark:focus:bg-gray-900 focus:outline-none focus:ring-0 active:bg-gray-200 text-gray-400">
                                            @if($child->selected)
                                                <svg class="ml-4 h-10 w-10 text-green-400" fill="none" stroke-linecap="round"
                                                     stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            @endif
                                            <!-- Select Child -->
                                            <a id="{{$child->id}}" type="button" href="#"
                                               class="w-full ml-3 inline-block px-1 py-2 bg-transparent text-gray-700 dark:text-gray-300 font-medium text-sm leading-tight transition duration-150 ease-in-out"
                                               wire:click="selectChild({{ $child->id }})">
                                                {{$child->first_name}}
                                            </a>
                                            <!-- Edit button -->
                                            <a
                                                href="#"
                                                class="py-2 px-1 hover:text-blue-600"
                                                wire:click="edit({{ $child->id }})"
                                            >
                                                <svg class="h-6 xl:h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <!-- Delete button -->
                                            <a
                                                href="#"
                                                class="py-2 px-1 hover:text-red-600 pr-4"
                                                wire:click.prevent="delete({{ $child->id }})"
                                            >
                                                <svg class="h-6 xl:h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                </div>
            @endif
            </div>
    </div>
@endif
