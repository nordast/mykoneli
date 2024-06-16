@php
    /** @var App\Models\Post $post */
@endphp

@extends('layouts.main')

@section('page.title', $post->title)
@section('header.class', 'menu-white')

@section('content')

    @include('posts.show.breadcrumb')

    <section class="blog-page pad-tb">
        <div class="container">
            <div class="row">

                @include('posts.show.details')
                @include('posts.show.sidebar')

            </div>
        </div>
    </section>

@endsection
