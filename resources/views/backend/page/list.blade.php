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
    </tr>    
    @endforeach
</table>
@endsection
