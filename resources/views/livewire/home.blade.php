<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Home content</h1>
{{--                <h1 class="p-4">User ID = {{\App\Http\Controllers\ChildController::userId(\Illuminate\Support\Facades\Auth::user())}}</h1>--}}
            </div>
        </div>
    </div>
</x-app-layout>