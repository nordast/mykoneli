@php
    /** @var \App\Models\Contact $contact */
@endphp

@extends('emails.layout')

@section('content')
Hello {{ $contact->name }},<br />
<br />
Thank you for reaching out to us through the contact form on our website.<br />
We have received your message and will get back to you as soon as possible.<br />
<br />
Best regards,<br />
{{ config('app.name') }}<br />
<a href="{{ config('app.url') }}">{{ config('app.url') }}</a>
@endsection
