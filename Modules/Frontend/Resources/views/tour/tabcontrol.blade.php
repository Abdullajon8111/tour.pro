@push('after_styles')
    <style>
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active  {
            color: #fff;
            background-color: #7c69ef;
        }

        .nav-tabs .nav-link.active, .nav-tabs .nav-link.active:focus {
            background-color: #7c69ef;
            border-bottom: 1px solid #7c69ef;
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

        .tab-content {
            border: 0;
            border-top: 5px solid #7c69ef;
            border-radius: 0;
        }
    </style>
@endpush

@php
/** @var \App\Models\Tour $tour */
@endphp

<ul class="nav nav-tabs" role="tablist">
{{--    <li class="nav-item"><button class="nav-link active" id="home-tab" data-toggle="tab" href="#tab-1" role="tab">{{ __('Описание') }}</button></li>--}}
{{--    @if($tour->program)--}}
{{--        <li class="nav-item"><button class="nav-link" id="profile-tab" data-toggle="tab" href="#tab-2">{{ __('Программа') }}</button></li>--}}
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
</ul>

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
                            @if($tour->time_type == \App\Models\Tour::TIME_TYPE_SEASONAL)
                                {{ $tour->start_time->getTranslatedMonthName() }}
                                -
                                {{ $tour->end_time->getTranslatedMonthName() }}
                            @else
                                {{ $tour->start_time->format('d.m.Y') }}-{{ $tour->end_time->format('d.m.Y') }}
                            @endif
                        </h6>
                        <h6 class="text-black-50">
                            {{ \App\Models\Tour::time_types()[$tour->time_type] }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4">
            {!! $tour->description !!}
        </div>
    </div>

{{--    @if($tour->program)--}}
{{--        <div class="tab-pane fade" id="tab-2" role="tabpanel">{!! $tour->program !!}</div>--}}
{{--    @endif--}}

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

        </div>
    @endif


</div>
