@extends('backend.layouts.app')

@section('title', app_name() . ' | Modifier la page')

@section('content')

{!! Form::model($page, ['url' => route('admin.page.update', $page)]) !!}
    @include('backend.page._form')
    <p>
        <input class="btn btn-success" type="submit" value="Modifier la page" />
    </p>
{!! Form::close() !!}

@endsection
