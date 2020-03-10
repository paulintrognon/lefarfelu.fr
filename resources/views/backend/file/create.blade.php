@extends('backend.layouts.app')

@section('title', app_name() . ' | Nouveau fichier')

@section('content')

{!! Form::open(['url' => route('admin.file.store'), 'enctype' => 'multipart/form-data']) !!}
    @include('backend.file._form')
    <p>
        <input class="btn btn-success" type="submit" value="Enregistrer le fichier" />
    </p>
{!! Form::close() !!}

@endsection
