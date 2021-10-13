@extends('dashboard')

@section('content')

<main>
    <div class="container editForm">
        <div class="row">
            <div class="col">
                <h2>Modifier une catégorie</h2>
            </div>
        </div>
        <div class="row">
            <form class="d-flex flex-column" action="{{ route('categories.update', $category) }}" method="post">
                @csrf
                @method('PATCH')
            <div class="col mb-3">
              <label for="type" class="form-label">Nom de la catégorie</label>
              <input type="text" class="form-control" id="type" name="type" value="{{ $category->type }}">
            </div>
            <button type="submit" class="btn btn-outline-dark btn-sm">Modifier</button>
            </form>
        </div>
    </div>
</main>

@endsection