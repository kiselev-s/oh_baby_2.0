<div>
    <div class="w-12 h-12">
        <img wire:click="showEditDocsModal({{$id}})"
            class="w-full h-full object-cover rounded-full cursor-pointer hover:opacity-50"
                src='{{URL::asset('storage/'.$preview[$id])}}'>
    </div>
</div>

