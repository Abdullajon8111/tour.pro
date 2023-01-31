@extends('frontend::layouts.master')

@section('content')

    <div class="container py-4">
        <h1 class="text-center my-3">{{ __('Регистрация') }} ({{ __('турист') }})</h1>
        <form action="{{ route('register.tourist.post') }}" method="post">
            @csrf
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="card card-body bold-labels shadow-sm">
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
                            <input name="password" type="password" class="form-control" placeholder="{{ __('пароль') }}">
                            @error('password')<span class="text-danger">{{ $errors->first('password') }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('подтвердить пароль') }}<sup class="text-danger">*</sup></label>
                            <input name="password_confirmation" type="password" class="form-control" placeholder="{{ __('подтвердить пароль') }}">
                            @error('password_confirmation')<span class="text-danger">{{ $errors->first('password_confirmation') }}</span>@enderror
                        </div>

                        <hr class="w-100">

                        <div class="form-group">
                            <label>{{ __('имя') }}<sup class="text-danger">*</sup></label>
                            <input name="name" type="text" class="form-control" placeholder="{{ __('имя') }}">
                            @error('name')<span class="text-danger">{{ $errors->first('name') }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('фамилия') }}</label>
                            <input name="surname" type="text" class="form-control" placeholder="{{ __('фамилия') }}">
                            @error('surname')<span class="text-danger">{{ $errors->first('surname') }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('телефон') }}<sup class="text-danger">*</sup></label>
                            <input name="phone" type="text" class="form-control" placeholder="{{ __('телефон') }}">
                            @error('phone')<span class="text-danger">{{ $errors->first('phone') }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="{{ __('Регистрация') }}">
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection
