@extends('frontend::layouts.master')

@section('head')
    {!! seo()->for($tour) !!}
@endsection

@section('after_styles')
    <style>
        .banner {
            height: 600px;
            position: relative;
        }

        .parallax-image {
            width: 100%;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            background-color: rgba(0, 0, 0, 0.3);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -3;
        }

        .banner .banner-mask {
            background-color: #000;
            opacity: .4;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -2;
        }

        .banner-text {
            text-shadow: 0 2px 2px rgb(0 0 0 / 90%);
        }
    </style>
@endsection

@php /** @var \App\Models\Tour $tour */ @endphp

@section('content')
    <div class="banner d-flex">
        <div class="banner-mask"></div>
        <div class="parallax-image" style="background-image: url('{{ asset("storage/{$tour->banner_image}") }}')"></div>
        <div class="m-auto text-center text-white">
            <div class="d-none d-sm-none d-xl-block d-md-block d-lg-block banner-text">
                <h1 class="banner-header-text display-2 font-weight-bold">{{ $tour->name }}</h1>
                <h3 class="banner-description">{{ $tour->sub_title }}</h3>
            </div>

            <div class="d-block d-sm-block d-xl-none d-md-none d-lg-none">
                <h1 class="banner-header-text font-weight-bold">{{ $tour->name }}</h1>
                <h3 class="banner-description">{{ $tour->sub_title }}</h3>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: -150px;">
        <div class="row">
            <div class="col-lg-9">
                @include('frontend::tour.tabcontrol')

                @include('frontend::tour.comments')
            </div>

            <div class="col-lg-3">
                <div class="form-group text-center">
                    <button class="btn btn-primary px-4 py-2 text-uppercase font-weight-bold" style="border-radius: 50px">
                        {{ __('Заказать тур') }}
                        <i class="la la-arrow-right"></i>
                    </button>
                </div>

                <div class="card border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="m-0 font-weight-bold text-center">15 162 000 UZS</h3>
                    </div>

                    <div class="card-body">
                        <div class="font-weight-bold text-center">{{ __('На одного человека') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after_scripts')
    <script>
        // Parallax
        function parallax() {
            var windowPosition = $(window).scrollTop();
            var windowHeight = $(window).height();
            $('.parallax-image').each(function () {
                var elementImage = $(this).find('img');
                var imageHeight = elementImage.height();
                var elementBottom = $(this).position().top + $(this).outerHeight(true);
                scrollPercent = 100 * (elementBottom - windowPosition) / (windowHeight + imageHeight);
                elementImage.css('object-position', '0% ' + scrollPercent + '%');
            });
        }

        $(document.body).on('touchmove', parallax);
        $(window).bind('scroll', parallax);
    </script>
@endsection
