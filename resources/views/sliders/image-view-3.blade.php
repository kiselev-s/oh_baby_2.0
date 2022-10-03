@push('styles')
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
@endpush
<div class="w-1/2">
    <div class="flex absolute z-10">
        <div class="flex">
            <a
                href="#"
                class="py-2 px-1 hover:text-blue-600 text-gray-400"
                wire:click.prevent="edit({{1}})"
            >
                <svg class="h-7 xl:h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </a>
            <a
                href="#"
                class="py-2 px-1 hover:text-red-600 text-gray-400"
                wire:click.prevent="submitDelete({{1}})"
            >
                <svg class="h-7 xl:h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </a>
        </div>
    </div>
    <div style="--swiper-navigation-color: #3d572d; --swiper-pagination-color: #237741"
        class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($imagesChild as $image)
                <div class="swiper-slide">
                    <div class="swiper-zoom-container">
                        <img src="{{URL::asset('storage/'.$image->path)}}" />
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>
@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            dynamicBullets: true,
            zoom: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
@endpush
