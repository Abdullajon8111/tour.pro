@if (config('backpack.base.show_powered_by') || config('backpack.base.developer_link'))
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-3">
                <h4 class="text-white">{{ __('О нас') }}</h4>
                <p class="text-secondary">
                    TURLINE – компания, успешно осуществляющая туроператорскую и агентскую деятельность.
                    Компания обладает серьезной репутацией, с выдающимся прошлым и передовым будущим!
                </p>
            </div>

            <div class="offset-lg-6 col-lg-3">
                <h4 class="text-white">{{ __('Наши контакты') }}</h4>


                    <style>
                        .bg-icon {
                            min-height: 33px;
                            min-width: 33px;
                            padding: 6px;
                            background: #d9e2ef;
                            border-radius: 50%;
                            color: #334960 !important;
                        }

                        .bg-icon i {
                            font-size: 1.5em !important;
                        }
                    </style>

                <div class="d-flex py-1">
                    <div class="la-stack fa-2x my-auto text-muted bg-icon">
                        <i class="la la-lock la-stack-2x la-map-marker"></i>
                    </div>
                    <p class="my-auto ml-2 text-secondary">Ташкент, ул. Нукусская 100, 2/3</p>
                </div>

                <div class="d-flex py-1">
                    <span class="la-stack fa-2x my-auto text-muted bg-icon">
                        <i class="la la-lock la-stack-2x la-phone"></i>
                    </span>
                    <p class="my-auto ml-2 text-secondary">+998 94 416 11 10</p>
                </div>

                <div class="d-flex py-1">
                    <span class="la-stack fa-2x my-auto text-muted bg-icon">
                        <i class="la la-lock la-stack-2x la-mobile"></i>
                    </span>
                    <p class="my-auto ml-2 text-secondary">+998 90 995 15 49</p>
                </div>

                <div class="d-flex py-1">
                    <span class="la-stack fa-2x my-auto text-muted bg-icon">
                        <i class="la la-stack-2x la-envelope"></i>
                    </span>
                    <a href="mailto:info@turline" class="my-auto ml-2 text-secondary">info@turline.uz</a>
                </div>
            </div>
        </div>
    </div>


    <hr class="w-100 border-white">

    <div class="text-muted ml-auto mr-auto mb-3">
        @if (config('backpack.base.developer_link') && config('backpack.base.developer_name'))
            {{ trans('backpack::base.handcrafted_by') }} <a target="_blank" rel="noopener" href="{{ config('backpack.base.developer_link') }}">{{ config('backpack.base.developer_name') }}</a>.
        @endif
    </div>
@endif
