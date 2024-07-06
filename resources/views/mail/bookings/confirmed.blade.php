@extends('layouts.mail')

@section('preview_text')
    Your Booking has been Approved!
@endsection

@section('title')
    Booking Approved
@endsection

@section('content')
    Your booking for {{ $propertyName }} has been approved. We look forward to seeing you soon.
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
