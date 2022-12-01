<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select
        name="{{ $name }}"
        id="{{ $name }} {{ $id }}"
        class="form-control select2 {{ $class }} @error($name) is-invalid @enderror"
        style="width: 100%;"
    >
        @foreach($options as $option)
            <option value="{{ $option }}">{{ str_replace('_', ' ', str()->title($option)) }}</option>
        @endforeach
    </select>

    @error($name)
        <span id="{{ $name }}-error" class="error invalid-feedback">
            {{ $message }}
        </span>
    @enderror
</div>
