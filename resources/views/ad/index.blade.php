@extends(backpack_view('blank'))

@php
    $defaultBreadcrumbs = [
      trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
      __('Туры') => back()->getTargetUrl(),
      __('Рекламировать') => false,
    ];

    // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
    $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
    <div class="container-fluid">
        <h2>
            <span class="text-capitalize">{!! __('Рекламировать') !!}</span>
            <small id="datatable_info_stack">{!! __('Выберите удобный для вас тариф') !!}</small>
        </h2>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">

            <section class="py-5">
                <div class="">
                    <div class="row">

                        @foreach($types as $type)
                            <div class="col-lg-4">
                                <div class="card mb-5 mb-lg-0 rounded-lg shadow">
                                    <div class="card-header">
                                        <h5 class="card-title text-uppercase text-center">{{ $type->name }}</h5>
                                        <h6 class="h1 text-center"> {{ number_format(($type->amount / 100)) }} UZS</h6>
                                    </div>
                                    <div class="card-body rounded-bottom">
                                        <ul class="list-unstyled mb-4">
                                            <li class="mb-3"><span class="mr-3"><i class="fas fa-check text-success"></i></span>{{ $type->label }}</li>
                                        </ul>
                                        <a href="{{ route('ads.pay', ['tour' => $tour, 'type' => $type->id]) }}" class="btn btn-block btn-lg btn-primary text-uppercase rounded-lg">{{ __('Купить сейчас') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

        </div>

    </div>

@endsection

@section('after_styles')
    <!-- DATA TABLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/crud.css').'?v='.config('backpack.base.cachebusting_string') }}">
    <link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/form.css').'?v='.config('backpack.base.cachebusting_string') }}">
    <link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/list.css').'?v='.config('backpack.base.cachebusting_string') }}">

    <!-- CRUD LIST CONTENT - crud_list_styles stack -->
    @stack('crud_list_styles')
@endsection

@section('after_scripts')
    <script src="{{ asset('packages/backpack/crud/js/crud.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
    <script src="{{ asset('packages/backpack/crud/js/form.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
    <script src="{{ asset('packages/backpack/crud/js/list.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>

    <!-- CRUD LIST CONTENT - crud_list_scripts stack -->
    @stack('crud_list_scripts')
@endsection
