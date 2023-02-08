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

@php
    /** @var \App\Models\Tour $tour */
@endphp

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
{{--                <div class="form-group text-center">--}}
{{--                    <button class="btn btn-primary px-4 py-2 text-uppercase font-weight-bold" style="border-radius: 50px">--}}
{{--                        {{ __('Заказать тур') }}--}}
{{--                        <i class="la la-arrow-right"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}

                <div class="card border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="m-0 font-weight-bold text-center">15 162 000 UZS</h3>
                    </div>

                    <div class="card-body">
                        <div class="font-weight-bold text-center">{{ __('На одного человека') }}</div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header">
                        <h6 class="font-weight-bold mb-0">{{ __('ПОЛЬЗОВАТЕЛЬ') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img height="50" class="rounded-circle" src="{{ asset("storage/{$agent->photo}") }}" alt="">
                            </div>
                            <div class="col-9">
                                <h6 class="text-dark mb-0">{{ $agent->name }}</h6>
                                <h6 class="text-black-50">{{ __('создан в') }} {{ $agent->created_at->locale(app()->getLocale())->translatedFormat('F Y') }}</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-outline-primary btn-tel btn-block mb-1">{{ __('Телефон') }}</button>
                                <a href="tel:{{ $agent->phone }}" class="btn btn-outline-primary btn-block mb-1" style="display: none">{{ $agent->phone }}</a>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary btn-block mb-1" data-toggle="modal" data-target="#application-modal">{{ __('Заявление') }}</button>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('frontend.page.user_tours', $tour->user) }}" class="btn btn-link">
                                    {{ __('Все объявления автора') }}
                                    <i class="la la-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after_scripts')
    <!-- Modal -->
    <div class="modal fade" id="application-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('frontend.appeal.store') }}" class="bold-labels" method="post">
                        @csrf
                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                        <div class="form-group">
                            <label for="">{{ __('Имя') }}</label>
                            <input type="text" class="form-control" name="name" value="{{  auth()->check() ? auth()->user()->name : '' }}">
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Телефон') }}</label>
                            <input type="text" class="form-control" name="phone" value="{{ auth()->check() ? auth()->user()->tourist?->phone : '' }}">
                        </div>

                        <div class="d-flex">
                            <button type="button" class="btn btn-secondary mr-1 ml-auto" data-dismiss="modal">{{ __('Закрыть') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Отправить') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

        $('.btn-tel').click(function () {
            $(this).hide()
            $(this).next().show()
        })
    </script>
@endsection
