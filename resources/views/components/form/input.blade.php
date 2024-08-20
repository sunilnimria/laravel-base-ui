<div class="form-group">
    @if (isset($labelName))
        <x-form.label for="{{ isset($labelFor) ? $labelFor : '' }}" labelName="{{ $labelName }}"/>
    @endif
    <input  {{ $attributes->merge() }} class="form-control"/>
    @if (isset($desc))
        <x-form.description desc="{{$desc}}"/>
    @endif
</div>
