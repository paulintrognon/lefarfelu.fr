@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.file.list'))

@section('content')
<p>
    <a class="btn btn-info" href="{{ route('admin.file.create') }}">Nouveau fichier</a>
</p>
    
<table class="table table-bordered" style="background: white;">
    <tr>
        <th>ID</th>
        <th>Nom du fichier</th>
        <th>URL</th>
        <th>Actions</th>
    </tr>
    @foreach ($files as $file)
    <tr>
        <td>
            {{ $file->id }}
        </td>
        <td>
            {{ $file->media->original_file_name }}
        </td>
        <td>
            <a href="{{ $file->media->publicUrl() }}" target="_blank">
                {{ $file->media->publicUrl() }}
            </a>
        </td>
        <td>
            <div class="buttons has-addons">
                <a href="{{ route('admin.file.edit', $file) }}">
                    <i class="fas fa-edit"></i>
                    Modifier
                </a>
                -
                <a href="{{ route('admin.file.delete', $file) }}">
                    <i class="fas fa-trash"></i>
                    Supprimer
                </a>
            </div>
        </td>
    </tr>    
    @endforeach
</table>
@endsection
