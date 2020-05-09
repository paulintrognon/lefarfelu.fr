@extends('frontend.layouts.blank')

@section('body')
<div style="background-color: orange;padding:1rem;display:flex;justify-content:space-between;">
    <a href="{{ route('admin.page.history', [$page]) }}" style="color: white;font-weight:500;">&lt; Retour</a>
    <form method="POST" action="{{ route('admin.page.history.restore', [$page, $history]) }}">
        @csrf
        <button type="submit" onclick="return confirm('Êtes-vous sûr ?')">Restaurer cette version</button>
    </form>
</div>

<div>
    {!! $history->content !!}
</div>
@endsection
