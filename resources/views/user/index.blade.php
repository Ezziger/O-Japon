@extends('layouts.app')

@section('content')

<main>
    <h2>Liste des utilisateurs</h2>
    <div class="container d-flex justify-content-center flex-wrap">
        @foreach($users as $user)
        <div class="card cardHeigth" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $user->pseudo }}</h5>
                <div class="d-flex justify-content-center">
                    <form action="{{ route('user.destroy', $user) }}" method="POST">
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