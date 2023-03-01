@if(isset($sliderTours))
    @push('after_styles')
        <style>
            .swiper {
                width: 100%;
                height: 100%;
            }

            .swiper-slide {
                text-align: center;
                font-size: 18px;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .swiper {
                width: 100%;
                height: 300px;
                margin-left: auto;
                margin-right: auto;
            }

            .swiper-slide {
                background-size: cover;
                background-position: center;
            }

            .mySwiper2 {
                height: 400px;
                width: 100%;
            }

            .mySwiper {
                height: 150px;
                box-sizing: border-box;
                padding: 10px 0;
            }

            .mySwiper .swiper-slide {
                width: 25%;
                height: 100%;
                opacity: 0.4;
            }

            .mySwiper .swiper-slide-thumb-active {
                opacity: 1;
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        </style>
    @endpush

    <div class="row">
        <div class="col-lg-12">
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    @foreach($sliderTours as $sTour)
                        <div class="swiper-slide">
                            <img src="{{ asset("storage/{$sTour->banner_image}") }}" />
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <div thumbsSlider="" class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach($sliderTours as $sTour)
                        <div class="swiper-slide">
                            <img height="100%" src="{{ asset("storage/{$sTour->banner_image}") }}" />
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


    @push('after_scripts')
        <script>
            var swiper = new Swiper(".mySwiper", {
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".mySwiper2", {
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });
        </script>
    @endpush
@endif
