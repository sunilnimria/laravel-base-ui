<div class="form-group">
    @if (isset($labelName))
        <x-form.label for="{{ isset($labelFor) ? $labelFor : '' }}" labelName="{{ $labelName }}" />
    @endif
    <select {{ $attributes->merge() }} class="form-select form-control">
        <option value="">None</option>
        @foreach ($options as $option)
            <option value="{{ $option['value'] }}"
                @if (isset($option['selected'])) {{ $option['selected'] == true ? 'selected' : '' }}  @endif >
                {{ $option['label'] }}
            </option>
        @endforeach
    </select>
    @if (isset($desc))
        <x-form.description desc="{{ $desc }}" />
    @endif
</div>

