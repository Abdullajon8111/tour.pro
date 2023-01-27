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

<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab-1" role="tab">{{ __('Описание') }}</a></li>
    <li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab-2">{{ __('Программа') }}</a></li>
    <li class="nav-item"><a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-3">{{ __('О курорте') }}</a></li>
    <li class="nav-item"><a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-4">{{ __('Отели') }}</a></li>
    <li class="nav-item"><a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-5">{{ __('Цены') }}</a></li>
    <li class="nav-item"><a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-6">{{ __('Виза') }}</a></li>
    <li class="nav-item"><a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-7">{{ __('Фото') }}</a></li>
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
                        <h6 class="font-weight-bold">От 7 до 14 дней</h6>
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
                        <h6 class="font-weight-bold">0+</h6>
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
                        <h6 class="font-weight-bold">Январь – Март</h6>
                        <h6 class="text-black-50">{{ __('Сезон') }}</h6>
                    </div>
                </div>
            </div>
        </div>
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

    <div class="tab-pane fade" id="tab-4" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab-5" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab-6" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab-7" role="tabpanel"></div>


</div>
