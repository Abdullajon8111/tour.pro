<div class="form-group mt-3">
    <a class="btn btn-outline-info mt-2 mr-1" href="{{ route('frontend.page.index') }}"> {{ __('Все') }} </a>

    @foreach($tags as $tag)
        <button onclick="searchByTags('{{ $tag->slug }}')"
                class="btn btn-outline-primary mt-2 mr-1 {{ in_array($tag->slug, explode(',', request('tags'))) ? 'btn-primary' : 'btn-outline-primary' }}">

            {{ $tag->name }}
        </button>
    @endforeach

    @push('after_scripts')
        <script>
            function searchByTags(tag) {
                const urlSearchParams = new URLSearchParams(window.location.search)
                const params = Object.fromEntries(urlSearchParams.entries())

                let tags_array = [];
                if (params['tags']) {
                    tags_array = params['tags'].split(',')
                }

                if (tags_array.includes(tag)) {
                    tags_array.splice( tags_array.indexOf(tag) , 1)
                } else {
                    tags_array.push(tag)
                }

                let tags = tags_array.join(',')

                window.location.href = `{{ route('frontend.page.index') }}?tags=${tags}`
            }
        </script>
    @endpush
</div>
