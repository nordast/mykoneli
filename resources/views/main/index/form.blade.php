<x-form action="{{ route('contact.store') }}" method="POST" id="contactForm">
    <input type="hidden" name="key" value="{{old('key') ?: request()->query('key')}}">

    <div class="row">
        <div class="form-group col-sm-6">
            <x-input name="name" placeholder="Your Name" required />
        </div>
        <div class="form-group col-sm-6">
            <x-input type="email" name="email" placeholder="Email Address" required />
        </div>
    </div>

    <div class="form-group">
        <x-input name="subject" placeholder="Subject" required />
    </div>

    <div class="form-group">
        <x-textarea name="content" placeholder="Message" required />

        @error('recaptcha')
            <div class="help-block with-errors">
                {{ $errors->first('recaptcha') }}
            </div>
        @enderror
    </div>

    @production
        <x-recuptcha />
    @endproduction

    @env('local')
        <x-button>Send</x-button>
    @endenv

    <p class="trm">
        <i class="fas fa-lock"></i>We hate spam, and we respect your privacy.
    </p>

</x-form>
