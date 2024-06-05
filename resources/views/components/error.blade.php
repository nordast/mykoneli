@error($attributes->get('name'))
    <div class="help-block with-errors">
        {{ $message }}
    </div>
@enderror
