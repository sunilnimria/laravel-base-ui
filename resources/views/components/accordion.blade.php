<div {{ $attributes->merge([
    'id'=>'accordionFlushExample',
    'class'=>'accordion accordion-flush'
]) }}>
    @foreach ($options as $option)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#{{ Qs::removeSplCHToStr($option['title'] ) }}" aria-expanded="false" aria-controls="flush-collapseOne">
                    {{$option['title']}}
                </button>
            </h2>
            <div id="{{ Qs::removeSplCHToStr($option['title'] ) }}" class="accordion-collapse collapse" data-bs-parent="#{{$attributes['id']}}">
                <div class="accordion-body">
                    {{$option['desc']}}
                </div>
            </div>
        </div>
    @endforeach
</div>
