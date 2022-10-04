<div class="w-1/2">

    <div id="carouselExampleCaptions" class="carousel slide relative p-4" data-bs-ride="carousel">
{{--        <div class="pl-1 flex absolute w-full justify-between z-10 pr-9 mt-2" wire:model="indexImage">--}}
{{--            <a--}}
{{--                href="#"--}}
{{--                class="px-1 hover:text-blue-600 text-gray-400"--}}
{{--                wire:click.prevent="editImage({{$indexImage}})"--}}
{{--            >--}}
{{--                <svg class="h-7 xl:h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--            <div>--}}
{{--            @if($imagesChild)--}}
{{--                <h1>{{$imagesChild[$count]->title}}</h1>--}}
{{--            @else--}}
{{--                <h1>Not Category</h1>--}}
{{--            @endif--}}
{{--            </div>--}}
{{--            <a--}}
{{--                href="#"--}}
{{--                class="px-1 hover:text-red-600 text-gray-400"--}}
{{--                wire:click.prevent="submitDeleteImage()"--}}
{{--            >--}}
{{--                <svg class="h-7 xl:h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--        </div>--}}
        <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
            @foreach($imagesChild as $key => $image)
                <button
                    type="button"
                    data-bs-target="#carouselExampleCaptions"
                    data-bs-slide-to={{$key}}
                    class="active"
                    aria-current="true"
                    aria-label="Slide {{$key}}"
                ></button>
            @endforeach
        </div>
        <div class="carousel-inner w-full overflow-hidden card-img rounded bg-gray-100" wire:model="indexImage">
            @foreach($imagesChild as $key => $image)
            <div class="carousel-item float-left w-full{{ $loop->first ? ' active' : '' }} {{ $loop->first ? $indexImage = $key : '' }}">
                <img wire:click="showImage({{$key}})"
                    src="{{URL::asset('storage/'.$image->path)}}"
                        class="block w-full rounded"
                    alt="..."
                />
{{--                <div class="carousel-caption hidden md:block absolute text-center">--}}
{{--                    <h5 class="text-xl">First slide label</h5>--}}
{{--                    <p>Some representative placeholder content for the first slide.</p>--}}
{{--                </div>--}}
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
