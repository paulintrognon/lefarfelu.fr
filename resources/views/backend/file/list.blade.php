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
        <th>Date</th>
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
            <a href="{{ $file->media->downloadUrl() }}" target="_blank">
                {{ $file->media->downloadUrl() }}
            </a>
        </td>
        <td>
            {{ $file->created_at->format('d/m/Y - H:i') }}
        </td>
        <td>
            <div class="buttons has-addons">
                <a href="{{ route('admin.file.delete', $file) }}" onclick="return confirm('Confirmer la suppression de {{ addslashes($file->media->original_file_name) }} ?')">
                    <i class="fas fa-trash"></i>
                    Supprimer
                </a>
            </div>
        </td>
    </tr>    
    @endforeach
</table>
@endsection
