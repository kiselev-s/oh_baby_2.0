@if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
    <div>
{{--        <p class="hidden">{{\App\Http\Controllers\UserController::userId(Auth::user())}}</p>--}}
{{--        <p class="hidden">{{\App\Http\Controllers\UserController::teamId(Auth::user()->currentTeam->id)}}</p>--}}

        @if(\App\Http\Controllers\UserController::findChild(Auth::user()->id, Auth::user()->currentTeam->id) != null)
            <div class="flex">

                <!-- Icon Child gender -->
                @if(\App\Http\Controllers\UserController::getGender(Auth::user()->id, Auth::user()->currentTeam->id))
                    <img src="{{URL::asset('/boy.png')}}" alt="boy" width="30">
                @else
                    <img src="{{URL::asset('/girl.png')}}" alt="girl" width="30">
                @endif

                <div class="ml-1 relative">
                    <x-jet-dropdown align="right" width="60">
        {{--                {{\App\Http\Controllers\UserController::userId(Auth::user())}}--}}
        {{--                {{\App\Http\Controllers\UserController::teamId(Auth::user()->currentTeam->id)}}--}}
                        <x-slot name="trigger">
                            <!-- Current Child -->
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
    {{--                                        {{ Auth::user()->getChild(Auth::user()->id)->first_name }}--}}
                                    @if(\App\Http\Controllers\UserController::getCurrentChild(Auth::user()->id, Auth::user()->currentTeam->id))
{{--                                        {{\App\Http\Controllers\UserController::getChildById()}}--}}
                                        {{\App\Http\Controllers\UserController::getCurrentChild(Auth::user()->id, Auth::user()->currentTeam->id)}}
                                    @else
{{--                                        {{\App\Http\Controllers\UserController::getRandomChild()->first_name}}--}}
                                        not child
                                    @endif

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
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
                                @foreach (\App\Http\Controllers\UserController::getAllChild(Auth::user()->id, Auth::user()->currentTeam->id) as $child)
                                    <div class="flex items-center hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-0 active:bg-gray-200">
                                        @if($child->selected)
                                        <svg class="ml-4 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        @endif
                                        <p id="{{$child->id}}" type="button" class="w-full ml-3 inline-block px-1 py-2 bg-transparent text-gray-700 font-medium text-sm leading-tight transition duration-150 ease-in-out"
                                                wire:click="selectChild({{ $child->id }})">
                                            {{$child->first_name}}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>
        @endif
    </div>
@endif
