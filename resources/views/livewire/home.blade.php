<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg p-4 dark:text-green-500">
{{--                <h1>Home content</h1>--}}
{{--                <h1 class="p-4">User ID = {{\App\Http\Controllers\ChildController::userId(\Illuminate\Support\Facades\Auth::user())}}</h1>--}}
{{--                {{\App\Http\Controllers\ChildController::getCurrentChild(Auth::user()->currentTeam->id)}}--}}

                <div class="flex">
                    <div class="flex items-center bg-gray-50 dark:bg-gray-700 shadow-lg dark:shadow-blue-900 sm:rounded-lg p-5 mr-5">
                        <img src="{{URL::asset('/parent.png')}}" alt="boy" width="50">
                        <p class="p-3">Parent:</p>
                        <p>{{Auth::user()->name}}</p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 shadow-lg dark:shadow-blue-900 sm:rounded-lg p-5 mr-5">
                        @if(\App\Http\Controllers\ChildController::getGender(Auth::user()->currentTeam->id) == 1)
                            <div class="flex items-center">
                                <img src="{{URL::asset('/boy.png')}}" alt="boy" width="50">
                                <p class="ml-2">{{ __('Son:') }}</p>
                            </div>
                        @else
                            <div class="flex items-center">
                                <img src="{{URL::asset('/girl.png')}}" alt="girl" width="50">
                                <p class="ml-2">{{ __('Daughter:')}}</p>
                            </div>
                        @endif
                        {{\App\Http\Controllers\ChildController::getFIO(Auth::user()->currentTeam->id)}}

                        <div>
                            Birthday:
                            {{\App\Http\Controllers\ChildController::getBirthday(Auth::user()->currentTeam->id)}}
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 shadow-lg dark:shadow-blue-900 sm:rounded-lg p-5 mr-5">
                        <div class="flex items-center">
                            <img src="{{URL::asset('/growth.png')}}" alt="girl" width="50">
                            <p class="ml-2 mr-2">Growth:</p>
                            <p>
                                {{\App\Http\Controllers\ChildController::getGrowth(Auth::user()->currentTeam->id)}}
                            </p>
                        </div>
                        <div class="flex items-center">
                            <img src="{{URL::asset('/weight.png')}}" alt="girl" width="50">
                            <p class="ml-2 mr-2">Weight:</p>
                            <p>
                                {{\App\Http\Controllers\ChildController::getWeight(Auth::user()->currentTeam->id)}}
                            </p>
                        </div>
                    </div>
                    <div class="bg-gray-50  dark:bg-gray-700 shadow-lg dark:shadow-blue-900 sm:rounded-lg p-5 mr-5">
                        <div class="flex items-center">
                            <img src="{{URL::asset('/birthday.png')}}" alt="girl" width="50">
                            <p class="ml-2 mr-2">Left before the holiday:</p>
                        </div>
                        <div class="flex justify-center">
                            <p>
                                {{\App\Http\Controllers\ChildController::getWeight(Auth::user()->currentTeam->id)}}
                            </p>
                            <p class="ml-2 mr-2">day(s)</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 shadow-lg dark:shadow-blue-900 sm:rounded-lg p-5">
                        <div class="flex items-center">
                            <img src="{{URL::asset('/health.png')}}" alt="girl" width="50">
                            <p class="ml-2 mr-2">Visit to the doctor:</p>
                        </div>
                        <div class="flex justify-center">
                            <p>
                                {{\App\Http\Controllers\ChildController::getBirthday(Auth::user()->currentTeam->id)}}
                            </p>
                        </div>
                    </div>
                </div>
                @livewire('home-charts')
            </div>
        </div>
    </div>
</x-app-layout>
