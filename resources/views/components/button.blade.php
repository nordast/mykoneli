<button {{ $attributes->merge([
    'type'  => 'submit',
    'class' => 'btn lnk btn-main bg-btn',
]) }}>
    {{ $slot }} <span class="circle"></span>
</button>
