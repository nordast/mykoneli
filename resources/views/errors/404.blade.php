@extends('layouts.main')

@section('page.title', __('Not Found'))
@section('header.class', 'menu-white')

@section('content')
    <section class="error bg-gradient pad-tb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mt50 mb50">
                    <div class="layer-div">
                        <div class="error-block">
                            <h1>Not Found (#404)</h1>
                            <p>Page not found.</p>
                            <div class="images mt20">
                                <img src="{{ asset('/images/shape/error-page.png') }}" alt="error page" class="img-fluid"/>
                            </div>
                            <a href="{{ route('main') }}" class="btn-outline">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
