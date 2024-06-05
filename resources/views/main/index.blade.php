@extends('layouts.main')

@section('page.title', 'Custom web development')
{{--@section('header.class', 'menu-dark')--}}

@section('content')

    @include('main.index.home')
    @include('main.index.about')
    @include('main.index.service')
    @include('main.index.choose')
    @include('main.index.contact')

@endsection
