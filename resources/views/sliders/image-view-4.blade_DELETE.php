@push('styles')
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
@endpush
<div class="swiper w-1/2">
    <div class="swiper-wrapper">
        <div class="swiper-slide menu">Menu slide</div>
        <div class="swiper-slide content">
            <div class="menu-button">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            Content slide
        </div>
    </div>
</div>
@push('scripts')
    <!-- Swiper JS -->
{{--    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var menuButton = document.querySelector('.menu-button');
        var openMenu = function () {
            swiper.slidePrev();
        };
        var swiper = new Swiper('.swiper', {
            slidesPerView: 'auto',
            initialSlide: 1,
            resistanceRatio: 0,
            slideToClickedSlide: true,
            on: {
                slideChangeTransitionStart: function () {
                    var slider = this;
                    if (slider.activeIndex === 0) {
                        menuButton.classList.add('cross');
                        // required because of slideToClickedSlide
                        menuButton.removeEventListener('click', openMenu, true);
                    } else {
                        menuButton.classList.remove('cross');
                    }
                },
                slideChangeTransitionEnd: function () {
                    var slider = this;
                    if (slider.activeIndex === 1) {
                        menuButton.addEventListener('click', openMenu, true);
                    }
                },
            },
        });
    </script>
@endpush
