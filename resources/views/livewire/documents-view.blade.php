<div>
    <div class="flex-col">
        <div>{{$child_name}}</div>
        <div>{{$team_id}}</div>
        <div>{{$user_name}}</div>
    </div>
    <button wire:click.prevent="show()" type="button"
            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
        Show
    </button>
</div>
