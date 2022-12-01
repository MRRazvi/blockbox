<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }} {{ $id }}"
        class="form-control {{ $class }} @error($name) is-invalid @enderror"
        placeholder="{{ $placeholder }}"
        value="{{ $value }}"
    />

    @error($name)
        <span id="{{ $name }}-error" class="error invalid-feedback">
            {{ $message }}
        </span>
    @enderror
</div>
