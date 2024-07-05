@extends('layouts.mail')

@section('preview_text')
    Thank you for getting in contact. We will be in touch shortly.
@endsection

@section('title')
    Contact Request Received
@endsection

@section('content')
    Thank you for getting in contact. We will be in touch shortly.
@endsection

@section('button_text')
    Our Website
@endsection

@section('button_link')
    {{ url('/') }}
@endsection

@section('company_info')
    © {{ date('Y') }} {{ $theme->company_name }}. All rights reserved.
@endsection
