@extends('frontend::layouts.master')

@section('content')
    <div class="container py-3">
        <div class="form-group">
            <h3 class="font-weight-bold">{{ __('Выберите направление') }}</h3>
        </div>

        <div class="card card-body bg-secondary">
            @include('frontend::home.search-form')
        </div>

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

        <div class="form-group mt-3">
            @foreach($tags as $tag)
                <a href="{{ route('frontend.page.index') }}?tag={{$tag->slug}}" class="badge py-2 px-3 badge-primary mb-1">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>

        <div class="form-group mt-3">
            <h2 class="font-weight-bold text-center">{{ __('ВСЕ ТУРЫ') }}</h2>
            <hr class="w-100">
        </div>

        @foreach($tours as $tour)
            @include('frontend::components.tour-card', compact('tour'))
        @endforeach

        <div class="d-flex justify-content-center">
            {{ $tours->withQueryString()->links() }}
        </div>
    </div>

@endsection
