<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select
        name="{{ $name }}"
        id="{{ $name }} {{ $id }}"
        class="form-control select2 {{ $class }}"
        style="width: 100%;"
    >
        @foreach($options as $option)
            <option value="{{ $option }}">{{ str_replace('_', ' ', str()->title($option)) }}</option>
        @endforeach
    </select>
</div>
