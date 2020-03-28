@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.page.list'))

@section('content')
<p>
    <a class="btn btn-info" href="{{ route('admin.page.create') }}">Nouvelle page</a>
</p>
    
<table class="table table-bordered" style="background: white;">
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>URL</th>
        <th>Dernière modification</th>
        <th>Actions</th>
    </tr>
    @foreach ($pages as $page)
    <tr>
        <td>
            {{ $page->id }}
        </td>
        <td>
            {{ $page->title }}
        </td>
        <td>
            <a href="{{ $page->publicUrl() }}" target="_blank">
                {{ $page->publicUrl() }}
            </a>
        </td>
        <td>
            <b>{{ $page->lastEditBy->getFullNameAttribute() }}</b>,
            le {{ $page->updated_at->format('d/m/Y à H:i:s')}}
            · 
            <a href="{{ route('admin.page.history', $page) }}" title="Restaurer une ancienne version">
                <i class="fas fa-history"></i>
                Restaurer
            </a>
        </td>
        <td>
            <a href="{{ route('admin.page.edit', $page) }}">
                <i class="fas fa-edit"></i> Modifier
            </a>
        </td>
    </tr>    
    @endforeach
</table>
@endsection
