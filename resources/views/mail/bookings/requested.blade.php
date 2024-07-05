@extends('layouts.mail')

@section('preview_text')
    Thank you for requesting a booking with us. We will be in touch shortly.
@endsection

@section('title')
    Booking Request Received
@endsection

@section('content')
    Thank you for requesting a booking with us. We will be in touch shortly.
@endsection

@section('button_text')
    Any Questions?
@endsection

@section('button_link')
    {{ url('/contact') }}
@endsection

@section('company_info')
    © {{ date('Y') }} {{ $theme->company_name }}. All rights reserved.
@endsection
