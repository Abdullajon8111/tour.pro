@extends('frontend::layouts.master')

@section('content')

    <div class="container py-4">
        <h1 class="text-center my-3">{{ __('Регистрация') }} ({{ __('турагент') }})</h1>
        <form action="{{ route('register.tour-agent.post') }}" method="post">
            @csrf
            <div class="card card-body bold-labels shadow-sm">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>{{ __('логин') }}<sup class="text-danger">*</sup></label>
                            <input name="login" type="text" class="form-control" placeholder="{{ __('логин') }}">
                            @error('login')<span class="text-danger">{{ $errors->first('login') }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('email') }}</label>
                            <input name="email" type="email" class="form-control" placeholder="{{ __('email') }}">
                            @error('email')<span class="text-danger">{{ $errors->first('email') }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('пароль') }}<sup class="text-danger">*</sup></label>
                            <input name="password" type="password" class="form-control"
                                   placeholder="{{ __('пароль') }}">
                            @error('password')<span class="text-danger">{{ $errors->first('password') }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('подтвердить пароль') }}<sup class="text-danger">*</sup></label>
                            <input name="password_confirmation" type="password" class="form-control"
                                   placeholder="{{ __('подтвердить пароль') }}">
                            @error('password_confirmation')<span
                                class="text-danger">{{ $errors->first('password_confirmation') }}</span>@enderror
                        </div>

                    </div>

                    <div class="col-lg-7">
                        <div class="form-group">
                            <label>{{ __('название') }}<sup class="text-danger">*</sup></label>
                            <input name="name" type="text" class="form-control" placeholder="{{ __('название') }}">
                            @error('name')<span class="text-danger">{{ $errors->first('name') }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('телефон') }}<sup class="text-danger">*</sup></label>
                            <input name="phone" type="text" class="form-control" placeholder="{{ __('телефон') }}">
                            @error('phone')<span class="text-danger">{{ $errors->first('phone') }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('телефон') }} 2</label>
                            <input name="phone2" type="text" class="form-control" placeholder="{{ __('телефон') }} 2">
                            @error('phone2')<span class="text-danger">{{ $errors->first('phone2') }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('регион') }}</label>
                            <select class="custom-control custom-select" name="region_id">
                                @foreach(\App\Models\Region::all() as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>

{{--                        @include('auth::fields.select2', ['field' => [--}}
{{--                            'name' => 'region_id',--}}
{{--                            'label' => __('регион'),--}}
{{--                            'model' => \App\Models\Region::class,--}}
{{--                            'attribute' => 'name',--}}
{{--                            'wrapper' => ['class' => 'form-group']--}}
{{--                        ]])--}}
                    </div>

                    <hr class="w-100">

                    @include('auth::fields.image', ['field' => [
                            'name' => 'photo',
                            'label' => __('фото'),
                            'crop' => true,
                            'aspect_ratio' => 1,
                            'disk' => 'public',
                            'prefix' => 'uploads/images/tour-agent',
                            'wrapper' => [
                                'class' => 'form-group col-lg-5'
                            ]
                    ]])

                    <div class="form-group col-lg-7">
                        <label>{{ __('описание') }}</label>
                        <textarea rows="10" name="description" type="text" class="form-control" placeholder="{{ __('описание') }}"></textarea>
                        @error('description')<span class="text-danger">{{ $errors->first('description') }}</span>@enderror
                    </div>

                    <div class="form-group col-lg-12">
                        <input type="submit" class="btn btn-primary btn-block" value="{{ __('Регистрация') }}">
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection
