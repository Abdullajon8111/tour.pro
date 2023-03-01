@extends('frontend::layouts.master')

@section('content')
    <div class="container py-3">
        <div class="form-group">
            <h3 class="font-weight-bold">{{ __('Выберите направление') }}</h3>
        </div>

        <div class="card card-body bg-secondary">
            @include('frontend::home.search-form')
        </div>

        @include('frontend::partials.slider-tour')
        @include('frontend::partials.tags')

        <div class="form-group mt-3">
            <h2 class="font-weight-bold text-center">{{ __('ВСЕ ТУРЫ') }}</h2>
            <hr class="w-100">
        </div>

        @foreach($tours as $tour)
            @include('frontend::components.tour-card', compact('tour'))
        @endforeach

        <div class="d-flex justify-content-center">
            {{ $tours->withQueryString()->links() }}
        </div>
    </div>

@endsection
