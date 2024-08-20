<div class="form-group">
    <label class="form-label d-block">{{$labelName}}</label>
    <div class="selectgroup selectgroup-secondary selectgroup-pills">
        @foreach ($options as $option)
        <label class="selectgroup-item">
            <input type="{{$option['type']}}" name="{{$option['name']}}" value="{{$option['value']}}" class="selectgroup-input"
            {{ $option['checked']== true ? 'checked' : ''}} />
            <span class="selectgroup-button selectgroup-button-icon"><i class="{{$option['icon']}}"></i>{{$option['label']}}</span>
        </label>
        @endforeach
    </div>
</div>
