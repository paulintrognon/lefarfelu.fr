@extends('backend.layouts.app')

@section('title', app_name() . ' | Nouvelle page')

@section('content')

{!! Form::open(['url' => route('admin.page.store')]) !!}
    @include('backend.page._form')
{!! Form::close() !!}

@endsection
