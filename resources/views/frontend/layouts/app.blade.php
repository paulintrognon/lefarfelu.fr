@extends('frontend.layouts.blank')

@section('body')
@include('frontend.includes.header')
<div class="container">
    @include('includes.partials.messages')
    @yield('content')
</div>
@include('frontend.includes.footer')
@endsection
