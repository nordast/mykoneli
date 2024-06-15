@php
    /** @var App\Models\Post $post */
@endphp

@extends('layouts.main')

@section('page.title', 'Blog')
@section('header.class', 'menu-white')

@section('content')

    @include('posts.index.breadcrumb')

    <section class="blog-page pad-tb pt40">
        <div class="container">
            <div class="row">

                @forelse ($posts as $post)
                    @include('posts.index.item', ['post' => $post])
                @empty
                    <div class="col text-center py-5">{{ __('No results found.')  }}</div>
                @endforelse

            </div>

            <div class="row">
                {{ $posts->links() }}
            </div>

        </div>
    </section>

@endsection
