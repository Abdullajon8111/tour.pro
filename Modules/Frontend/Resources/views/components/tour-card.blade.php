@push('after_styles')
    <style>
        .vr {
            overflow-x: hidden;
            position: relative;
        }

        .vr:before {
            content: " ";
            display: block;
            width: 1px;
            height: 100%;
            min-height: 300px;
            position: absolute;
            top: 0;
            right: 0;
            background: #ebebeb;
            border: 1px solid #EBEBEB;
            z-index: 3;
        }
    </style>
@endpush

<div class="row no-gutters border bg-white rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative grid-divider">
    <div class="col-auto d-none d-lg-block">
        <a href="{{ route('frontend.page.show') }}">
            <img height="222" src="{{ asset('images/beautiful-sun-shining-across-mountains-1-720x606.jpg') }}"
                 alt="tour-img">
        </a>
    </div>

    <div class="col p-4 d-flex flex-column position-static">
        <a href="{{ route('frontend.page.show') }}">
            <h3 class="mb-0 font-weight-bold">Featured post</h3>
        </a>
        <p class="card-text mb-auto mt-3">This is a wider card with supporting text below as a natural lead-in to additional content.</p>

        <div class="row">
            <div class="col">
                <div class="bg-secondary rounded px-2 p-1">
                    <i class="la la-clock mr-2 text-danger"></i>
                    <span>От 7 до 14 дней</span>
                </div>
            </div>

            <div class="col">
                <div class="bg-secondary rounded px-2 p-1">
                    <i class="la la-user mr-2 text-danger"></i>
                    <span>0+</span>
                </div>
            </div>
        </div>

    </div>

    <div class="col p-4 d-flex flex-column position-static vr">
        <div class="text-center mt-5">
            <h4 class="font-weight-bold text-success">15 162 000 UZS</h4>
            <a href="{{ route('frontend.page.show') }}" class="btn btn-info rounded">Подробнее</a>
        </div>

    </div>
</div>


