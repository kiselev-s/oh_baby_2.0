<div>
    <form wire:submit.prevent="submit" enctype="multipart/form-data">

        <div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter title" wire:model="title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter category" wire:model="category">
            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter children_id" wire:model="children_id">
            @error('children_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <input type="file" class="form-control" wire:model="view">
            @error('view') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
<h1>----------------------------</h1>
<div>
    <form wire:submit.prevent="submit" enctype="multipart/form-data">

        <div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter title" wire:model="title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <input type="file" class="form-control" wire:model="view">
            @error('view') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    <button wire:click="export">
        Download File
    </button>
</div>
