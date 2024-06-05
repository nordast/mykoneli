<button class="g-recaptcha btn lnk btn-main bg-btn"
        data-sitekey="{{ config('services.recaptcha.site_key') }}"
        data-callback='onSubmit'
        data-action='submitContact'>
    Send <span class="circle"></span>
</button>

@push('head')
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endpush

@push('scripts')
    <script>
        function onSubmit(token) {
            document.getElementById("contactForm").submit();
        }
    </script>
@endpush
