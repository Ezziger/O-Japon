@extends('dashboard')

@section('content')

<main>
<a href="{{ route('regions.index') }}">Administrer une région</a>
<a href="{{ route('categories.index') }}">Administrer une categorie</a>

</main>

@endsection