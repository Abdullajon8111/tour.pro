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
            opacity: .3;
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

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active  {
            color: #fff;
            background-color: #7c69ef;
        }

        .nav-tabs .nav-link.active, .nav-tabs .nav-link.active:focus {
            background-color: #7c69ef;
        }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link {
            color: #000;
            background-color: #fff;
        }

        .nav-tabs .nav-item {
            margin-right: 5px;
        }

        .nav-tabs .nav-item .nav-link {
            padding: 0 20px;
            height: 48px;
            line-height: 50px;
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
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab-1" role="tab">
                            {{ __('Описание') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab-2">
                            {{ __('Программа') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-3">
                            {{ __('О курорте') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-3">
                            {{ __('Отели') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-3">
                            {{ __('Цены') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-3">
                            {{ __('Виза') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-3">
                            {{ __('Фото') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="tab-content">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                        Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro
                        synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher
                        retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip
                        placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
                    </div>
                    <div class="tab-pane fade" id="tab-2" role="tabpanel">
                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1
                        labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft
                        beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                        vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica
                        VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson
                        8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester
                        stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.
                    </div>
                    <div class="tab-pane fade" id="tab-3" role="tabpanel">
                        Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro
                        fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone
                        skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings
                        gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel
                        fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer
                        blog stumptown. Pitchfork sustainable tofu synth chambray yr.
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
