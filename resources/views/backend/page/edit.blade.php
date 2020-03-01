@extends('backend.layouts.app')

@section('title', app_name() . ' | Modifier la page')

@section('content')

{!! Form::model($page, ['url' => route('admin.page.update', $page)]) !!}
    @include('backend.page._form')
    <p>
        <button class="btn btn-success" type="submit">
            <i class="fa fa-save"></i>
            Enregistrer les modifications
        </button>
    </p>
{!! Form::close() !!}

@endsection
