<textarea {{ $attributes->merge([
    'rows' => 6,
]) }}>{{ old($attributes->get('name')) ?: $attributes->get('value') }}</textarea>

<x-error name="{{ $attributes->get('name') }}" />
