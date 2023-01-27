@extends('frontend::layouts.master')

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

@section('content')
    <div class="banner d-flex">
        <div class="banner-mask"></div>
        <div class="parallax-image" style="background-image: url('{{ asset('images/beautiful-sun-shining-across-mountains-1.jpg') }}')"></div>
        <div class="m-auto text-center text-white">
            <div class="d-none d-sm-none d-xl-block d-md-block d-lg-block banner-text">
                <h1 class="banner-header-text display-2 font-weight-bold">Шри Ланка – Прямой перелет!</h1>
                <h3 class="banner-description">Прямой перелет на Шри — Ланку 2023 | Отдых в Индии | Курорты Шри — Ланки</h3>
            </div>

            <div class="d-block d-sm-block d-xl-none d-md-none d-lg-none">
                <h1 class="banner-header-text font-weight-bold">Шри Ланка – Прямой перелет!</h1>
                <h3 class="banner-description">Прямой перелет на Шри — Ланку 2023 | Отдых в Индии | Курорты Шри — Ланки</h3>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: -150px;">
        <div class="row">
            <div class="col-lg-9">
                @include('frontend::tour.tabcontrol')

                <div class="card shadow-sm mt-5">
                    <div class="card-header py-4">
                        <h4 class="text-center mb-0 font-weight-bold">{{ __('ОТЗЫВЫ ТУРИСТОВ') }}</h4>
                    </div>

                    <div class="card-body">
                        <div class="p-4">
                            <div class="avatar-info float-left mr-4">
                                <img class="img-avatar" width="122" src="{{ asset('images/avatar.png') }}" alt="avatar">
                                <h5 class="mt-2 text-center text-black-50">Наталья</h5>

                            </div>

                            <div class="rating-star w-100">
                                <i class="la la-star text-warning la-2x"></i>
                                <i class="la la-star text-warning la-2x"></i>
                                <i class="la la-star text-warning la-2x"></i>
                                <i class="la la-star la-2x"></i>
                                <i class="la la-star la-2x"></i>
                            </div>
                            <br>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur assumenda autem debitis eum facere, fuga hic, in itaque libero maiores nobis nostrum provident repellat saepe soluta suscipit ullam, voluptas.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur assumenda autem debitis eum facere, fuga hic, in itaque libero maiores nobis nostrum provident repellat saepe soluta suscipit ullam, voluptas.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur assumenda autem debitis eum facere, fuga hic, in itaque libero maiores nobis nostrum provident repellat saepe soluta suscipit ullam, voluptas.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur assumenda autem debitis eum facere, fuga hic, in itaque libero maiores nobis nostrum provident repellat saepe soluta suscipit ullam, voluptas.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur assumenda autem debitis eum facere, fuga hic, in itaque libero maiores nobis nostrum provident repellat saepe soluta suscipit ullam, voluptas.
                            </p>
                        </div>

                        <div class="p-4">
                            <p>{{ __('Здесь еще не было добавлено ни одного отзыва. Добавьте свой отзыв и станьте первым!') }}</p>
                        </div>
                    </div>

                    <div class="card-footer">
                        <form class="p-4" method="post" action="/">
                            @csrf
                            <h4 class="font-weight-bold">{{ __('Оставить отзыв') }}</h4>
                            <div class="select rating d-flex">
                                <div class="float-left my-auto">Рейтинг</div>
                                @include('frontend::tour.select-rating-star')
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-8">
                                    <textarea name="comment" cols="30" rows="10" class="form-control" placeholder="{{ __('Ваш отзыв') }}"></textarea>
                                </div>

                                <div class="form-group col-lg-6">
                                    <input type="text" name="name" class="form-control" placeholder="{{ __('Имя') }}">
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" placeholder="{{ __('Email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary px-4 py-2 text-uppercase">
                                    Отправить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
