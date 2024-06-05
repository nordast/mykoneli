<input {{ $attributes->merge([
    'type' => 'text',
    'value' => old($attributes->get('name')) ?: $attributes->get('value'),
]) }}>

<x-error name="{{ $attributes->get('name') }}" />
