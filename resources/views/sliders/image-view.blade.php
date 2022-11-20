<div class="w-full sm:w-1/2">
    <div id="carouselExampleCaptions" class="carousel slide relative p-4" data-bs-ride="carousel" wire:model="imagesChild">
        <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4" >
            @if($imagesChild != null)
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
            @endif
        </div>
        <div class="carousel-inner w-full overflow-hidden card-img rounded-lg bg-gray-100 dark:bg-gray-800">
            @if($imagesChild != null)
                @foreach($imagesChild as $key => $image)
                    <div class="carousel-item float-left w-full{{ $loop->first ? ' active' : '' }}">
                        <img
                            wire:click="showEditImage({{$key}})"
                            src="{{URL::asset('storage/'.$image->path)}}"
                            class="block w-full rounded hover:opacity-50 cursor-zoom-in"
                            alt="..."
                        />
                    </div>
                @endforeach
            @else
                <div class="flex justify-around w-full">
                    <div class="flex justify-center items-center space-x-2 dark:bg-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>

                        <span class="font-medium py-8 text-gray-400 text-xl dark:text-white">@lang('No image')</span>
                    </div>
                </div>
            @endif
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
