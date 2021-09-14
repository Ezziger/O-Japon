@extends('dashboard')

@section('content')
<div class="container">
    <div class="row">
        @foreach($regions as $region)
            <div class="card-body">
                <h5 class="card-title">{{ $region->nom }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('regions.edit', $region->id) }}" method="GET">
                    <button class="btn btn-primary btn-sm" type="submit">Editer</button>
                </form>
                <form action="{{ route('regions.destroy', $region->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary btn-sm" type="submit">Supprimer</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection