@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.page.list'))

@section('content')
<p>
    <a class="btn btn-info" href="{{ route('admin.page.edit', $page) }}">Editer la page acutelle</a>
</p>
    
<table class="table table-bordered" style="background: white;">
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>URL</th>
        <th>Par</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    @foreach ($histories as $history)
    <tr>
        <td>
            {{ $history->id }}
        </td>
        <td>
            {{ $history->title }}
        </td>
        <td>
            {{ $history->urlPath }}
        </td>
        <td>
            {{ $history->editedBy->getFullNameAttribute() }}
        </td>
        <td>
            {{ $history->created_at->format('d/m/Y à H:i:s')}}
        </td>
        <td>
            {{-- <a href="{{ route('admin.page.history', $history) }}" onclick="return confirm('Êtes-vous sûr de vouloir restaurer cette version ?')"> --}}
            <a href="#" onclick="alert('Fonctionnalité pas encore disponible')">
                <i class="fas fa-history"></i> Restaurer
            </a>
        </td>
    </tr>    
    @endforeach
</table>
@endsection
