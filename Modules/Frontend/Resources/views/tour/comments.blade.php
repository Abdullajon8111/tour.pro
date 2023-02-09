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

    <div class="card-footer position-relative">
        <div class="position-absolute d-flex" style="background-color: rgba(0,0,0,0.6); top: 0; bottom: 0; left: 0; right: 0; z-index: 10">
            <div class="d-flex flex-column justify-content-center m-auto" style="z-index: 11;">

                    <h3 class="text-white text-center mx-auto">
                        {{ __('Войдите, если хотите оставить комментарий') }}
                    </h3>


                <div class="form-group text-center">
                    <button class="btn btn-primary mt-3">
                        {{ __('Войти') }}
                    </button>
                </div>
            </div>


        </div>
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

{{--                <div class="form-group col-lg-6">--}}
{{--                    <input type="text" name="name" class="form-control" placeholder="{{ __('Имя') }}">--}}
{{--                </div>--}}
{{--                <div class="col-lg-1"></div>--}}
{{--                <div class="form-group col-lg-6">--}}
{{--                    <input type="email" class="form-control" placeholder="{{ __('Email') }}">--}}
{{--                </div>--}}
            </div>

            <div class="form-group">
                <button class="btn btn-primary px-4 py-2 text-uppercase">
                    {{ __('Отправить') }}
                </button>
            </div>
        </form>
    </div>
</div>