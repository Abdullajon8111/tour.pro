<div class="row">
    <div class="form-group col-lg-3">
        <select class="form-control custom-select">
            <option value="">{{ __('Выберите направление') }}</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
    </div>

    <div class="form-group col-lg-3">
        <select class="form-control custom-select">
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
