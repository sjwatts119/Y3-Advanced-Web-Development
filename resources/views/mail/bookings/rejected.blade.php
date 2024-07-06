@extends('layouts.mail')

@section('preview_text')
    Your Booking has been Rejected
@endsection

@section('title')
    Booking Rejected
@endsection

@section('content')
    Your booking for {{ $propertyName }} has been rejected, we are sorry for any inconvenience caused. If you have any questions, please do not hesitate to contact us.
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
