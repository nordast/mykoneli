@extends('layouts.main')

@section('page.title', 'AI Cost Calculator')
@section('header.class', 'menu-white')

@section('content')

    @include('calculator.index.breadcrumb')
    @include('calculator.index.about')
    @include('calculator.index.form')

@endsection
