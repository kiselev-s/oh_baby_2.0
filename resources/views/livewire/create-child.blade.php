<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
             role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                            <x-jet-input wire:model="first_name" id="first_name" type="text" class="mt-1 block w-full" placeholder="Enter First Name"/>
                            @error('first_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                            <x-jet-input wire:model="last_name" id="last_name" type="text" class="mt-1 block w-full" placeholder="Enter Last Name"/>
                            @error('last_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="birthday" value="{{ __('Birthday') }}" />
                            <x-jet-input wire:model="birthday" id="birthday" type="text" class="mt-1 block w-full" placeholder="Enter birthday"/>
                            @error('birthday') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="gender" value="{{ __('Gender') }}" />
                            <select wire:model="gender" id="gender" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option selected="">Choose gender</option>
                                <option value="1">Man</option>
                                <option value="0">Women</option>
                            </select>
                            @error('gender') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
{{--                        <div class="mb-4">--}}
{{--                            <x-jet-label for="user_id" value="{{ __('User_id') }}" />--}}
{{--                            <x-jet-input wire:model="aa" id="user_id" type="text" class="mt-1 block w-full" placeholder="Enter user_id"/>--}}
{{--                            @error('user_id') <span class="text-red-500">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                        <div class="mb-4">--}}
{{--                            <x-jet-label for="team_id" value="{{ __('Team_id') }}" />--}}
{{--                            <x-jet-input wire:model="team_id" id="gender" type="text" class="mt-1 block w-full" placeholder="Enter team_id"/>--}}
{{--                            @error('team_id') <span class="text-red-500">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store({{Auth::user()->id}}, {{Auth::user()->currentTeam->id}})" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Store
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModalPopover()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Close
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
