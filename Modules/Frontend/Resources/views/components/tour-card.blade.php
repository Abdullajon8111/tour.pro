@php
/**
 * @var $tour \App\Models\Tour
  */
@endphp

@push('after_styles')
    <style>
        .vr {
            overflow-x: hidden;
            position: relative;
        }

        .vr:before {
            content: " ";
            display: block;
            width: 1px;
            height: 100%;
            min-height: 300px;
            position: absolute;
            top: 0;
            right: 0;
            background: #ebebeb;
            border: 1px solid #EBEBEB;
            z-index: 3;
        }
    </style>
@endpush

<div class="row no-gutters border bg-white rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative grid-divider">
    <div class="col d-none d-lg-block">
        <a href="{{ route('frontend.page.show', ['tour' => $tour]) }}">
            <img height="250" src="{{ asset("storage/{$tour->banner_image}") }}"
                 alt="tour-img">
        </a>
    </div>

    <div class="col p-4 d-flex flex-column position-static">
        <a href="{{ route('frontend.page.show', ['tour' => $tour]) }}">
            <h4 class="mb-0 font-weight-bold">{{ $tour->name }}</h4>
        </a>
        <p class="card-text mb-auto mt-3">{{ $tour->title }}</p>

        <div class="row">
            <div class="col-6">
                <div class="bg-secondary rounded px-2 p-1">
                    <i class="la la-clock mr-2 text-danger"></i>
                    <span>{{ $tour->duration }}</span>
                </div>
            </div>

            <div class="col-3">
                <div class="bg-secondary rounded px-2 p-1">
                    <i class="la la-user mr-2 text-danger"></i>
                    <span>{{ $tour->age_limit }}</span>
                </div>
            </div>
        </div>

    </div>

    <div class="col p-4 d-flex flex-column position-static vr">
        <div class="text-center mt-5">
            <h4 class="font-weight-bold text-success">{{ number_format($tour->price_one) }}</h4>
            <a href="{{ route('frontend.page.show', ['tour' => $tour]) }}" class="btn btn-info rounded">{{ __('Подробнее') }}</a>
        </div>

    </div>
</div>


