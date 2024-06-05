<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="shadow bg-gradient3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 p-5">

                            <div class="common-heading text-l">
                                <span>Try it</span>
                                <h2 class="mt0 mb0">AI Cost Calculator</h2>
                                <p class="mb50 mt20">Simply enter your project name and a detailed description below, and we'll generate an estimated cost for developing your custom website.</p>
                            </div>

                            <div class="form-block">

                                <x-form action="{{ route('calculator.store') }}" method="POST">

                                    <div class="form-group mb-5">
                                        <x-input name="name" placeholder="Corporate Website Redesign" />
                                        <x-hint>Enter the name of your project</x-hint>
                                    </div>

                                    <div class="form-group mb-5">
                                        <x-textarea name="description" required placeholder="A fully responsive e-commerce site with user login, payment integration, and a custom inventory management system" />
                                        <x-hint>Describe your project in detail, including any specific features and functionalities you envision.</x-hint>
                                    </div>

                                    <div class="form-group">
                                        <x-button>Calculate</x-button>
                                    </div>

                                </x-form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
