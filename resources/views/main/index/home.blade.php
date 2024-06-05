@php
    $sliders = [
        'HighLoad' => 'images/service/home-slider-1.webp',
        'Big Data' => 'images/service/home-slider-2.webp',
        'AI'       => 'images/service/home-slider-3.webp',
        'DevOps'   => 'images/service/home-slider-4.webp',
    ];
@endphp

<section class="digitalagency20" id="home">
    <div class="appboxheroscroll">
        <img src="{{ asset('images/shape/shape-a.png') }}" class="appbox nxhs1" alt="icon" data-rellax-speed="4">
        <img src="{{ asset('images/shape/shape-b.png') }}" class="appbox nxhs2" alt="icon" data-rellax-speed="-3">
        <img src="{{ asset('images/shape/shape-c.png') }}" class="appbox nxhs3" alt="icon" data-rellax-speed="1">
        <img src="{{ asset('images/shape/shape-d.png') }}" class="appbox nxhs4" alt="icon" data-rellax-speed="-5">
        <img src="{{ asset('images/shape/shape-e.png') }}" class="appbox nxhs5" alt="icon" data-rellax-speed="-2">
    </div>
    <div class="hero-main-rp container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <div class="hero-heading-sec">
                    <h2 class="wow fadeIn" data-wow-delay="0.3s">Building Your Tomorrow: Bespoke Web Solutions from Industry Experts</h2>
                    <p class="wow fadeIn" data-wow-delay="0.6s">Explore custom web solutions that drive performance and scalability, designed to meet the unique challenges of your business.</p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="hero-right-scmm">
                    <div class="hero-service-cards wow fadeInRight" data-wow-duration="2s">
                        <div class="owl-carousel service-card-prb">

                            @foreach($sliders as $title => $image)
                                <x-slider-item image="{{ $image }}">
                                    {{ $title }}
                                </x-slider-item>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
