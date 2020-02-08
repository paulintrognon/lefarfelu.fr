@extends('backend.layouts.app')

@section('title', app_name() . ' | Modifier la page')

@section('content')

{!! Form::model($page, ['url' => route('admin.page.edit', $page)]) !!}
    @include('backend.page._form')
{!! Form::close() !!}

@endsection
