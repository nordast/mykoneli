@extends('layouts.main')

@section('page.title', 'AI Cost Calculator Details')
@section('header.class', 'menu-white')

@section('content')

    @include('calculator.show.breadcrumb')
    @include('calculator.show.about')
    @include('calculator.show.answer')

@endsection
