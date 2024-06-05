@props(['image' => null])

<div class="service-slide" data-tilt data-tilt-max="12" data-tilt-speed="1000">
{{--    <a href="#">--}}
        <div class="service-card-hh">
            <div class="image-sr-mm">
                @isset($image)
                    <img alt="custom-sport" src="{{ $image }}">
                @endisset
            </div>
            <div class="title-serv-c">{{ $slot }}</div>
        </div>
{{--    </a>--}}
</div>
