<div class="w-1/2">
    <div id="carouselExampleCaptions" class="carousel slide relative p-4" data-bs-ride="carousel" wire:model="imagesChild">
        <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4" >
            @foreach($imagesChild as $key => $image)
                <button
                    type="button"
                    data-bs-target="#carouselExampleCaptions"
                    data-bs-slide-to={{$key}}
                    class="{{ $loop->first ? ' active' : '' }}"
                    aria-current="true"
                    aria-label="Slide {{$key}}"
                ></button>
            @endforeach
        </div>
        <div class="carousel-inner w-full overflow-hidden card-img rounded bg-gray-100">
            @foreach($imagesChild as $key => $image)
            <div class="carousel-item float-left w-full{{ $loop->first ? ' active' : '' }}
{{--            {{ $loop->first ? $indexImage = $key : '' }}--}}
                ">
{{--                <img wire:click="showImage({{$key}})"--}}
                <img
                    wire:click="showEditImage({{$key}})"
                    src="{{URL::asset('storage/'.$image->path)}}"
                    class="block w-full rounded"
                    alt="..."
                />
            </div>
            @endforeach
        </div>
        <button
            class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next"
        >
            <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
