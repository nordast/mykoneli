@php
    /** @var \App\Models\Calculator $calculator */
@endphp

<section class="about-sec bg-gradient5 pad-tb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <p class="mb-2">
                    <b>Name:</b> {{ $calculator->name }}
                </p>

                <p class="mb-2">
                    <b>Description:</b> {{ $calculator->description }}
                </p>

                <p class="mb-2">
                    <b>Date:</b> {{ __datetime($calculator->created_at) }}
                </p>

{{--
                    <?php if(!empty($calculator->user_id)): ?>
                    <p class="mb-2">
                        <b>Added By:</b> <?php $calculator->user->username ?>
                    </p>
                    <?php endif; ?>
--}}
            </div>
        </div>
    </div>
</section>
