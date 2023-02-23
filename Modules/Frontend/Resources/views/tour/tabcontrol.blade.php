@push('after_styles')
    <style>
        /*.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active  {*/
        /*    color: #fff;*/
        /*    background-color: #7c69ef;*/
        /*}*/

        /*.nav-tabs .nav-link.active, .nav-tabs .nav-link.active:focus {*/
        /*    background-color: #7c69ef;*/
        /*    border-bottom: 1px solid #7c69ef;*/
        /*}*/

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link {
            color: #000;
            background-color: #fff;
            border-color: rgba(0,40,100,.12);
        }

        .nav-tabs .nav-item {
            margin-right: 0px;
        }

        .nav-tabs .nav-item .nav-link {
            padding: 0 20px;
            height: 48px;
            line-height: 50px;
            width: 100%;
        }

        .tab-content {
            border: 0;
            border-top: 5px solid #7c69ef;
            border-radius: 0;
        }

        .tab-content .tab-pane {
            padding: 3rem;
        }

        .timeline {
            list-style: none;
            padding: 20px 0 20px;
            position: relative;
        }

        .timeline > li {
            margin-bottom: 20px;
            position: relative;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li > .timeline-panel {
            border: 1px solid #d4d4d4;
            border-radius: 2px;
            padding: 20px;
            position: relative;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

        .timeline > li > .timeline-badge {
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 33%;
            background-color: #7c69ef;
            z-index: 100;
        }

        .timeline > li.timeline-inverted > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        .timeline > li.timeline-inverted > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }

        .timeline-heading {
            width: 70%;
        }

        .timeline-clock {
            width: 25%;
        }

        .timeline-title {
            margin-top: 0;
            color: inherit;
        }

        .timeline-body > p,
        .timeline-body > ul {
            margin-bottom: 0;
        }

        .timeline-body > p + p {
            margin-top: 5px;
        }

        .flex-container {
            display: flex;
            flex-flow: row wrap;
        }

        .flex-around {
            justify-content: space-around;
        }

        .flex-around {
            justify-content: space-around;
        }

        .nav-tabs {
            /*height: 42px;*/
            padding: 0;
            position: relative;
        }
        .nav-tabs .nav-item {
            margin-left: 0;
        }
        .nav-tabs .nav-item a {
            color: black;
            display: block;
            padding: 8px 25px;
        }
        .nav-tabs .nav-item.overflow-tab {
            background-color: white;
            display: none;
            position: absolute;
            right: 0;
            width: 150px;
            z-index: 1;
        }
        .nav-tabs .nav-item.overflow-tab a {
            border: 1px solid lightgray;
            border-radius: 0;
            padding: 6px 10px;
        }
        .nav-tabs .nav-item.overflow-tab a:hover, .nav-tabs .nav-item.overflow-tab a:focus, .nav-tabs .nav-item.overflow-tab a:active, .nav-tabs .nav-item.overflow-tab a.active {
            background-color: lightgray;
        }
        .nav-tabs .nav-item.overflow-tab:last-child {
            border-radius: 0 0 0 4px;
        }
        .nav-tabs .nav-item.overflow-tab-action {
            /*position: absolute;*/
            right: 0;
        }

        .responsive-tabs.nav-tabs {
            position: relative;
            z-index: 10;
            height: 42px;
            overflow: visible;
            border-bottom: none;
        }
        @media (min-width: 768px) {
            .responsive-tabs.nav-tabs {
                display: block;
            }
        }
        @media (max-width: 768px) {
            .responsive-tabs.nav-tabs {
                display: block;
                flex-wrap: none;
            }
        }
        .responsive-tabs.nav-tabs i.fa {
            position: absolute;
            top: 14px;
            right: 22px;
        }
        .responsive-tabs.nav-tabs i.fa.fa-caret-up {
            display: none;
        }
        @media (min-width: 768px) {
            .responsive-tabs.nav-tabs i.fa {
                display: none;
            }
        }
        .responsive-tabs.nav-tabs > li {
            display: none;
            float: none;
            text-align: center;
        }
        .responsive-tabs.nav-tabs > li:last-of-type > a {
            margin-right: 0;
        }
        .responsive-tabs.nav-tabs > li > a {
            margin-right: 0;
            background: #fff;
            border: 1px solid #DDDDDD;
        }
        @media (min-width: 768px) {
            .responsive-tabs.nav-tabs > li > a {
                margin-right: 4px;
            }
        }
        .responsive-tabs.nav-tabs > li.active {
            display: block;
        }
        .responsive-tabs.nav-tabs > li.active a {
            border: 1px solid #DDDDDD;
            border-radius: 2px;
        }
        @media (min-width: 768px) {
            .responsive-tabs.nav-tabs > li.active a {
                border-bottom-color: transparent;
            }
        }
        @media (min-width: 768px) {
            .responsive-tabs.nav-tabs > li {
                display: block;
                float: left;
            }
        }
        .responsive-tabs.nav-tabs.open i.fa.fa-caret-up {
            display: block;
        }
        @media (min-width: 768px) {
            .responsive-tabs.nav-tabs.open i.fa.fa-caret-up {
                display: none;
            }
        }
        .responsive-tabs.nav-tabs.open i.fa.fa-caret-down {
            display: none;
        }
        .responsive-tabs.nav-tabs.open > li {
            display: block;
        }
        .responsive-tabs.nav-tabs.open > li a {
            border-radius: 0;
        }
        .responsive-tabs.nav-tabs.open > li:first-of-type a {
            border-radius: 2px 2px 0 0;
        }
        .responsive-tabs.nav-tabs.open > li:last-of-type a {
            border-radius: 0 0 2px 2px;
        }

    </style>
@endpush

@push('after_scripts')
    <script>
        /**
         * Defines the bootstrap tabs handler.
         *
         * @param {string} element
         *  Element.
         */
        var tabsActions = function (element) {
            this.element = $(element);

            this.setup = function () {
                if (this.element.length <= 0) {
                    return;
                }
                this.init();
                // Update after resize window.
                var resizeId = null;
                $(window).resize(function () {
                    clearTimeout(resizeId);
                    resizeId = setTimeout(() => {this.init()}, 50);
                }.bind(this));
            };

            this.init = function () {

                // Add class to overflow items.
                this.actionOverflowItems();
                var tabs_overflow = this.element.find('.overflow-tab');

                // Build overflow action tab element.
                if (tabs_overflow.length > 0) {
                    if (!this.element.find('.overflow-tab-action').length) {
                        var tab_link = $('<a>')
                            .addClass('nav-link')
                            .attr('href', '#')
                            .attr('data-toggle', 'dropdown')
                            .text('...')
                            .on('click', function (e) {
                                e.preventDefault();
                                $(this).parents('.nav.nav-tabs').children('.nav-item.overflow-tab').toggle();
                            });

                        var overflow_tab_action = $('<li>')
                            .addClass('nav-item')
                            .addClass('overflow-tab-action')
                            .append(tab_link);

                        // Add hide to overflow tabs when click on any tab.
                        this.element.find('.nav-link').on('click', function (e) {
                            $(this).parents('.nav.nav-tabs').children('.nav-item.overflow-tab').hide();
                        });

                        this.element.append(overflow_tab_action);

                        if (!$('.favorite-item').length)
                            overflow_tab_action.addClass('ml-auto')
                    }

                    this.openOverflowDropdown();
                }
                else {
                    this.element.find('.overflow-tab-action').remove();
                }
            };

            this.openOverflowDropdown = function () {
                var overflow_sum_height = 0;
                var overflow_first_top = 41;

                this.element.find('.overflow-tab').hide();
                // Calc top position of overflow tabs.
                this.element.find('.overflow-tab').each(function () {
                    var overflow_item_height = $(this).height() - 1;
                    if (overflow_sum_height === 0) {
                        $(this).css('top', overflow_first_top + 'px');
                        overflow_sum_height += overflow_first_top + overflow_item_height;
                    }
                    else {
                        $(this).css('top', overflow_sum_height + 'px');
                        overflow_sum_height += overflow_item_height;
                    }

                });
            };

            this.actionOverflowItems = function () {
                var tabs_limit = this.element.width() - 100;
                var count = 0;

                // Calc tans width and add class to any tab that is overflow.
                for (var i = 0; i < this.element.children().length; i += 1) {
                    var item = $(this.element.children()[i]);
                    if (item.hasClass('overflow-tab-action') || item.hasClass('favorite-item')) {
                        continue;
                    }

                    count += item.width();
                    if (count > tabs_limit) {
                        item.addClass('overflow-tab');
                    }
                    // else if (count < tabs_limit) {
                    //     item.removeClass('overflow-tab');
                    //     item.show();
                    // }
                }
            };
        };

        var tabsAction = new tabsActions('.nav-tabs-wrapper .nav-tabs');
        tabsAction.setup();

    </script>
@endpush

@php
/** @var \App\Models\Tour $tour */
@endphp

<div class="nav-tabs-wrapper">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><button class="nav-link active" id="home-tab" data-toggle="tab" href="#tab-1" role="tab">{{ __('Описание') }}</button></li>

        @if($tour->program)
            <li class="nav-item"><button class="nav-link" id="profile-tab" data-toggle="tab" href="#tab-2">{{ __('Программа') }}</button></li>
        @endif

        @if($tour->about)
            <li class="nav-item"><button class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-3">{{ __('О курорте') }}</button></li>
        @endif

        @if($tour->hotels)
            <li class="nav-item"><button class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-4">{{ __('Отели') }}</button></li>
        @endif

        @if($tour->price_description)
            <li class="nav-item"><button class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-5">{{ __('Цены') }}</button></li>
        @endif

        @if($tour->visa)
            <li class="nav-item"><button class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-6">{{ __('Виза') }}</button></li>
        @endif

        @if($tour->images)
            <li class="nav-item"><button class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-7">{{ __('Фото') }}</button></li>
        @endif

        @auth
            <li class="nav-item favorite-item ml-auto">
                <button class="nav-link" id="favorites">
                    @if(!$tour->hasFavorite())
                        <i class="la la-heart-o"></i>
                        <i class="la la-heart text-danger" style="display: none"></i>
                    @else
                        <i class="la la-heart-o" style="display: none"></i>
                        <i class="la la-heart text-danger"></i>
                    @endif

                </button>
            </li>

            @push('after_scripts')
                <script>
                    $('#favorites').click(function () {
                        let favorite = $(this);
                        $.get('{{ route('frontend.tour.favorite', $tour) }}', function (response) {
                            if (response == 1) {
                                let i = favorite.children('i')
                                i.toggle()


                            }
                        })
                    })
                </script>
            @endpush
        @endauth

    </ul>
</div>

<div class="tab-content shadow-sm" id="tab-content">

    <div class="tab-pane pt-0 fade show active" id="tab-1" role="tabpanel" style="padding-left: 0; padding-right: 0;">
        <div class="row mx-0">
            <div class="col-lg-4 border border-right-0 border-left-0">
                <div class="row py-5">
                    <div class="offset-1 col-2 d-flex">
                        <i class="my-auto text-primary la-bold la la-clock la-2x"></i>
                    </div>
                    <div class="col-8">
                        <h6 class="font-weight-bold">{{ $tour->duration }}</h6>
                        <h6 class="text-black-50">{{ __('Количество дней') }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 border border-right-0">
                <div class="row py-5">
                    <div class="offset-1 col-2 d-flex">
                        <i class="my-auto text-primary la-bold la la-user la-2x"></i>
                    </div>
                    <div class="col-8">
                        <h6 class="font-weight-bold">{{ $tour->age_limit }}</h6>
                        <h6 class="text-black-50">{{ __('Возраст') }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 border border-right-0">
                <div class="row py-5">
                    <div class="offset-1 col-2 d-flex">
                        <i class="my-auto text-primary la-bold la la-calendar la-2x"></i>
                    </div>
                    <div class="col-8">
                        <h6 class="font-weight-bold">
                            @if($tour->start_time and $tour->end_time)
                                @if($tour->time_type == \App\Models\Tour::TIME_TYPE_SEASONAL)
                                    {{ $tour->start_time->getTranslatedMonthName() }}
                                    -
                                    {{ $tour->end_time->getTranslatedMonthName() }}
                                @else
                                    {{ $tour->start_time->format('d.m.Y') }}-{{ $tour->end_time->format('d.m.Y') }}
                                @endif
                            @endif
                        </h6>
                        <h6 class="text-black-50">
                            {{ \App\Models\Tour::time_types()[$tour->time_type] ?? '' }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4">
            @foreach($tour->tags as $tag)
                <a href="{{ route('frontend.page.index') }}?tag={{$tag->slug}}" class="badge py-2 px-3 badge-primary">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>

        <div class="p-4">
            {!! $tour->description !!}
        </div>
    </div>

    @if($tour->program)
        <div class="tab-pane fade" id="tab-2" role="tabpanel">
            <ul class="timeline mb-0">
                @foreach(json_decode($tour->program, true) as $program)
                    <li class="timeline-inverted">
                        <div class="timeline-badge">{{ $loop->index + 1 }}</div>
                        <div class="timeline-panel">
                            <div class="flex-container flex-around">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">{{ $program['title'] ?? '' }}</h4>
                                    {!! $program['description'] ?? '' !!}
                                </div>
                                {{--                            <div class="timeline-clock">--}}
                                {{--                                <p><i class="glyphicon glyphicon-time"></i> 120 minutes</p>--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($tour->about)
        <div class="tab-pane fade" id="tab-3" role="tabpanel">{!! $tour->about !!}</div>
    @endif
    @if($tour->hotels)
        <div class="tab-pane fade" id="tab-4" role="tabpanel">{!! $tour->hotels !!}</div>
    @endif
    @if($tour->price_description)
        <div class="tab-pane fade" id="tab-5" role="tabpanel">{!! $tour->price_description !!}</div>
    @endif
    @if($tour->visa)
        <div class="tab-pane fade" id="tab-6" role="tabpanel">{!! $tour->visa !!}</div>
    @endif

    @if($tour->images)
        <div class="tab-pane fade" id="tab-7" role="tabpanel">
            <div class="row" id="gallery">
                @foreach($tour->images as $image)
                    <div class="col-lg-3">
                        <a rel="gallery-1" href="{{ asset("storage/{$image}") }}" class="swipebox">
                            <img class="img-thumbnail" src="{{ asset("storage/{$image}") }}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @push('after_styles')
        <link rel="stylesheet" href="{{ asset('packages/swipebox/css/swipebox.min.css') }}">
    @endpush

    @push('after_scripts')
        <script src="{{ asset('packages/swipebox/js/jquery.swipebox.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#gallery').swipebox();
            })
        </script>
    @endpush

</div>
