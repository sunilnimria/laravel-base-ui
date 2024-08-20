<div class="form-group">
    @if (isset($slot['labelName']))
        <x-form.label for="{{ isset($slot['id']) ? $slot['id'] : '' }}" labelName="{{ $slot['labelName'] }}"/>
    @endif
    <textarea {{ $attributes->merge() }} class="form-control">@if( isset($slot['oldValue'])){{$slot['oldValue']}}@endif
    </textarea>
    @if (isset($slot['desc']))
        <x-form.description desc="{{$slot['desc']}}"/>
    @endif
</div>
