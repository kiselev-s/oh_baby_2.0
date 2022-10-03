@push('styles')
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
@endpush
<div class="flex w-1/2">
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach($imagesChild as $image)
        <div class="swiper-slide">
            <img src="{{URL::asset('storage/'.$image->path)}}" />
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
</div>
@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: "auto",
            centeredSlides: true,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
@endpush
