<div class="card shadow-sm mt-3">
    <div class="card-header py-4">
        <h4 class="text-center mb-0 font-weight-bold">{{ __('ОТЗЫВЫ ТУРИСТОВ') }}</h4>
    </div>

    <div class="card-body">
        @if(count($tour->comments))
            <div class="p-4">
                @foreach($tour->comments as $comment)
                    <div class="overflow-hidden mb-3">
                        <div class="avatar-info float-left mr-4 w-100">
{{--                            <img class="img-avatar" width="100" src="{{ asset('images/avatar.png') }}" alt="avatar">--}}
                            <h5 class="mt-2 text-black-50">{{ $comment->user->name }}</h5>

                        </div>

                        <div class="rating-star overflow-hidden w-100">
                            @php $rating = (int) $comment->rating @endphp
                            @foreach(range(1, 5) as $i)
                                <i class="la la-star {{ $rating > 0 ? 'text-warning' : '' }}"></i>
                                @php $rating -- @endphp
                            @endforeach

                        </div>

{{--                        <br>--}}
                        <p>{{ $comment->context }}</p>
                    </div>

                @endforeach
            </div>
        @else
            <div class="p-4">
                <p>{{ __('Здесь еще не было добавлено ни одного отзыва. Добавьте свой отзыв и станьте первым!') }}</p>
            </div>
        @endif
    </div>

    <div class="card-footer position-relative">
        @guest()
            <div class="position-absolute d-flex"
                 style="background-color: rgba(0,0,0,0.6); top: 0; bottom: 0; left: 0; right: 0; z-index: 10">

                <div class="d-flex flex-column justify-content-center m-auto" style="z-index: 11;">

                    <h3 class="text-white text-center mx-auto">
                        {{ __('Войдите, если хотите оставить комментарий') }}
                    </h3>


                    <div class="form-group text-center">
                        <a href="{{ route('auth.login') }}" class="btn btn-primary mt-3">
                            {{ __('Войти') }}
                        </a>
                    </div>
                </div>


            </div>
        @endguest

        <form class="p-4" method="post" action="{{ route('frontend.comment.store') }}">
            @csrf
            <input type="hidden" value="{{ $tour->id }}" name="tour_id">
            <h4 class="font-weight-bold">{{ __('Оставить отзыв') }}</h4>
            <div class="select rating d-flex">
                <div class="float-left my-auto">Рейтинг</div>
                @include('frontend::tour.select-rating-star')
            </div>
            <div class="row">
                <div class="form-group col-lg-8">
                    <textarea name="context" cols="30" rows="10" class="form-control"
                              placeholder="{{ __('Ваш отзыв') }}"></textarea>
                    @error('context') {{ $errors->has('context') }} @enderror
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
