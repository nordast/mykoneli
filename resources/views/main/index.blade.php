@extends('layouts.main')

@section('page.title', 'Custom web development')
{{--@section('header.class', 'menu-dark')--}}

@section('content')

    @include('main.index.home', [
        'slides' => [
            'HighLoad' => 'images/service/home-slider-1.webp',
            'Big Data' => 'images/service/home-slider-2.webp',
            'AI'       => 'images/service/home-slider-3.webp',
            'DevOps'   => 'images/service/home-slider-4.webp',
        ]
    ])

    @include('main.index.about')
    @include('main.index.service')
    @include('main.index.choose')
    @include('main.index.contact')

@endsection
