@extends('dashboard')

@section('content')

<main>
    <h2>Ajouter une catégorie</h2>
    <div class="container d-flex justify-content-center flex-wrap">
        @foreach($categories as $category)
        <div class="card cardHeigth" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $category->type }}</h5>
                <div class="d-flex justify-content-center">
                    <form action="{{ route('categories.edit', $category) }}" method="GET">
                        <button class="btn btn-outline-dark btn-sm m-1" type="submit">Editer</button>
                    </form>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-dark btn-sm m-1" type="submit">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection