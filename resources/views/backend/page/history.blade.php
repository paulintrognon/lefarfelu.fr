@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.page.list'))

@section('content')
<p>
    <a class="btn btn-info" href="{{ route('admin.page.edit', $page) }}">Aller à l'éditeur de la page</a>
</p>
    
<table class="table table-bordered" style="background: white;">
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Par</th>
        <th>Date</th>
        <th></th>
        <th></th>
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
            {{ $history->editedBy->getFullNameAttribute() }}
        </td>
        <td>
            {{ $history->created_at->format('d/m/Y à H:i:s')}}
        </td>
        <td>
            <a class="btn btn-info" href="{{ route('admin.page.history.preview', [$page, $history]) }}">
                Prévisualiser & restaurer
            </a>
        </td>
    </tr>    
    @endforeach
</table>
@endsection
