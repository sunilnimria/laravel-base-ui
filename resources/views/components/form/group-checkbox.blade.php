<div class="form-group">
    {{-- <label class="form-label">Your skills</label> --}}
    @if (isset($labelName))
        <x-form.label for="{{ isset($labelFor) ? $labelFor : '' }}" labelName="{{ $labelName }}" />
    @endif
    <div class="selectgroup selectgroup-pills form-control">
        @foreach ($options as $option)
            <label class="selectgroup-item">
                <input type="checkbox" name="{{ $option['name'] }}" value="{{ $option['value'] }}" class="selectgroup-input"
                    @if (isset($option['checked'])) {{ $option['checked'] == true ? 'checked' : '' }}  @endif />
                    <span class="selectgroup-button">{{ $option['label'] }}</span>
            </label>
        @endforeach

        {{-- <label class="selectgroup-item">
        <input
          type="checkbox"
          name="value"
          value="CSS"
          class="selectgroup-input"
        />
        <span class="selectgroup-button">CSS</span>
      </label>
      <label class="selectgroup-item">
        <input
          type="checkbox"
          name="value"
          value="PHP"
          class="selectgroup-input"
        />
        <span class="selectgroup-button">PHP</span>
      </label>
      <label class="selectgroup-item">
        <input
          type="checkbox"
          name="value"
          value="JavaScript"
          class="selectgroup-input"
        />
        <span class="selectgroup-button">JavaScript</span>
      </label>
      <label class="selectgroup-item">
        <input
          type="checkbox"
          name="value"
          value="Ruby"
          class="selectgroup-input"
        />
        <span class="selectgroup-button">Ruby</span>
      </label>
      <label class="selectgroup-item">
        <input
          type="checkbox"
          name="value"
          value="Ruby"
          class="selectgroup-input"
        />
        <span class="selectgroup-button">Ruby</span>
      </label>
      <label class="selectgroup-item">
        <input
          type="checkbox"
          name="value"
          value="C++"
          class="selectgroup-input"
        />
        <span class="selectgroup-button">C++</span>
      </label> --}}
    </div>
    @if (isset($desc))
        <x-form.description class="" desc="{{ $desc }}" />
    @endif
</div>
