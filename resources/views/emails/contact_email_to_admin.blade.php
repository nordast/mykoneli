@php
    /** @var \App\Models\Contact $contact */
@endphp

@extends('emails.layout')

@section('content')
    {{ $contact->content }}
{{--
    @isset($contact->key)
        <br /><br />
        <a href="{{ route('calculator.show', ['calculator' => $contact->key]) }}"></a>
    @endisset
--}}
@endsection
