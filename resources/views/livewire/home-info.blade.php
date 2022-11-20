<div class="flex flex-wrap justify-center sm:justify-between">
    <div class="mb-4 flex items-center bg-gray-50 dark:bg-gray-700 shadow-lg dark:shadow-blue-900 rounded-lg p-5">
        <img src="{{URL::asset('/parent.png')}}" alt="boy" width="50">
        <p class="p-3">Parent:</p>
        <p>{{Auth::user()->name}}</p>
    </div>

    <div class="mb-4 bg-gray-50 dark:bg-gray-700 shadow-lg dark:shadow-blue-900 rounded-lg p-5">
        @if(\App\Http\Controllers\ChildController::getGender(Auth::user()->currentTeam->id) == 1)
            <div class="flex items-center justify-center">
                <img src="{{URL::asset('/boy.png')}}" alt="boy" width="50">
                <p class="ml-2">{{ __('Son:') }}</p>
            </div>
        @else
            <div class="flex items-center justify-center">
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

    <div class="mb-4 bg-gray-50 dark:bg-gray-700 shadow-lg dark:shadow-blue-900 rounded-lg p-5">
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

    <div class="mb-4 bg-gray-50  dark:bg-gray-700 shadow-lg dark:shadow-blue-900 rounded-lg p-5">
        <div class="flex items-center">
            <img src="{{URL::asset('/birthday.png')}}" alt="girl" width="50">
            <p class="ml-2 mr-2">Left before the holiday:</p>
        </div>
        <div class="flex justify-center">
            <p>
                {{\App\Http\Controllers\ChildController::getHoliday(Auth::user()->currentTeam->id)}}
            </p>
            <p class="ml-2 mr-2">day(s)</p>
        </div>
    </div>

    <div class="mb-4 bg-gray-50 dark:bg-gray-700 shadow-lg dark:shadow-blue-900 rounded-lg p-5">
        <div class="flex items-center">
            <img src="{{URL::asset('/health.png')}}" alt="girl" width="50">
            <p class="ml-2 mr-2">Visit to the doctor:</p>
        </div>
        <div class="flex justify-center">
            <p>
                {{\App\Http\Controllers\ChildController::getMeeting(Auth::user()->currentTeam->id)}}
            </p>
        </div>
    </div>
</div>
