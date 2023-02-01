<div class="row">
    <div class="form-group col-lg-3">
        <select class="form-control custom-select select2">
            <option value="">{{ __('Выберите направление') }}</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
    </div>

    <div class="form-group col-lg-3">
        <select class="form-control custom-select select2">
            <option value="">{{ __('Выберите область') }}</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
    </div>

    <div class="form-group col-lg-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="{{ __('Туры по словам') }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">
                        <i class="la la-search"></i>
                    </span>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <button class="btn btn-primary btn-block">
            {{ __('Найти') }}
        </button>
    </div>
</div>

@push('after_styles')
    <link rel="stylesheet" href="{{ asset('packages/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/select2-bootstrap-theme/dist/select2-bootstrap.min.css') }}">

    <style>
        .select2-container--bootstrap .select2-selection--single {
            height: 38px !important;
        }

        .select2-container--bootstrap .select2-selection {
            border: 1px solid rgba(0,40,100,.12);
            border-radius: 3px;
        }
    </style>
@endpush

@push('after_scripts')
    <script src="{{ asset('packages/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({theme: 'bootstrap'})
        })
    </script>
@endpush
