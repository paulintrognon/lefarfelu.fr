@extends('frontend.layouts.app')

@section('title', $title . ' | ' . ucfirst(app_name()))

@section('content')
{!! $content !!}
@endsection
