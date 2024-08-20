<textarea ></textarea>
<div class="form-group">
    @if (isset($slot['labelName']))
        <x-form.label for="{{ isset($slot['id']) ? $slot['id'] : '' }}" labelName="{{ $slot['labelName'] }}"/>
    @endif
    <textarea id="myeditorinstance" {{ $attributes->merge() }} class="form-control">@if( isset($slot['oldValue'])){{$slot['oldValue']}}@endif
    </textarea>

</div>

