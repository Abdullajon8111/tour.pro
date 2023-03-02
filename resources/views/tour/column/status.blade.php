{{-- regular object attribute --}}
@php
    $value = data_get($entry, $column['name']);
    $value = is_array($value) ? json_encode($value) : $value;

    $column['escaped'] = $column['escaped'] ?? true;
    $column['limit'] = $column['limit'] ?? 40;
    $column['prefix'] = $column['prefix'] ?? '';
    $column['suffix'] = $column['suffix'] ?? '';
    $column['text'] = $column['prefix'].Str::limit($value ?? '', $column['limit'], '[...]').$column['suffix'];
@endphp

<span>
    <div class="">
        @if($value == \App\Models\Tour::STATUS_UNDER_REVIEW)
            <h6 class="badge badge-warning font-lg mx-0 my-1">
            {{ \App\Models\Tour::statuses()[$value] }}
        </h6>
        @endif

        @if($value == \App\Models\Tour::STATUS_PUBLISHED)
            <h6 class="badge badge-success font-lg mx-0 my-1">
            {{ \App\Models\Tour::statuses()[$value] }}
        </h6>
        @endif

    <br>

    @if(auth()->user()->hasRole(\App\Models\Role::ADMIN))
        @if($value == \App\Models\Tour::STATUS_UNDER_REVIEW)
            <a href="{{ route('tour-crud.status', ['tour' => $entry, 'status' => \App\Models\Tour::STATUS_PUBLISHED]) }}"
               class="btn btn-primary btn-sm btn-block">
                Publish
            </a>
        @endif

        @if($value == \App\Models\Tour::STATUS_PUBLISHED)
            <a href="{{ route('tour-crud.status', ['tour' => $entry, 'status' => \App\Models\Tour::STATUS_UNDER_REVIEW]) }}"
               class="btn btn-warning btn-sm btn-block">
                Unpublished
            </a>
        @endif

    @else
        <a href="{{ route('ads.index', $entry) }}" class="btn btn-sm btn-outline-info">
            <i class="la la-bookmark"></i>
            {{ __('Рекламировать') }}
        </a>
    @endif
    </div>
</span>
