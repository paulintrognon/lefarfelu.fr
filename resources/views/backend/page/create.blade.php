@extends('backend.layouts.app')

@section('title', app_name() . ' | Nouvelle page')

@section('content')

{!! Form::open(['url' => route('admin.page.store')]) !!}
    @include('backend.page._form')
    <p>
        <input class="btn btn-success" type="submit" value="Créer la page" />
    </p>
{!! Form::close() !!}

@endsection
