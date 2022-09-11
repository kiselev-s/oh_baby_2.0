@if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
    <div class="flex">
        @include('livewire.add-child')
            <div>
            @if(\App\Http\Controllers\ChildController::findChild(Auth::user()->currentTeam->id) != null)
                <div class="flex">

                    <!-- Icon Child gender -->
                    @if(\App\Http\Controllers\ChildController::getGender(Auth::user()->id, Auth::user()->currentTeam->id))
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
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{\App\Http\Controllers\ChildController::getCurrentChild(Auth::user()->currentTeam->id)}}
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
                                    @foreach (\App\Http\Controllers\ChildController::getAllChild(Auth::user()->currentTeam->id) as $child)
                                        <div
                                            class="flex items-center hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-0 active:bg-gray-200">
                                            @if($child->selected)
                                                <svg class="ml-4 h-10 w-10 text-green-400" fill="none" stroke-linecap="round"
                                                     stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            @endif
                                            <a id="{{$child->id}}" type="button" href="{{ url('/dashboard') }}"
                                               class="w-full ml-3 inline-block px-1 py-2 bg-transparent text-gray-700 font-medium text-sm leading-tight transition duration-150 ease-in-out"
                                               wire:click="selectChild({{ $child->id }})">
                                                {{$child->first_name}}
                                            </a>
                                            <button type="button" wire:click="edit({{ $child->id }})"
                                                    class="px-0.5 mr-1 inline-block bg-orange-500 text-white font-medium text-sm leading-tight rounded shadow-md hover:bg-orange-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
{{--                                                Edit--}}
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 p-0.5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <button type="button" wire:click="delete({{ $child->id }})"
                                                    class="px-0.5 mr-3 inline-block bg-red-600 text-white font-medium text-sm leading-tight rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
{{--                                                Delete--}}
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 p-0.5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
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
