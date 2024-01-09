@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des professeurs</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('professeurs.create') }}" class="btn btn-primary mb-3 float-end">Ajouter un professeur</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>UE</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($professeurs as $professeur)
                                <tr>
                                    <td>{{ $professeur->id }}</td>
                                    <td>{{ $professeur->nom }}</td>
                                    <td>{{ $professeur->prenom }}</td>
                                    <td>{{ $professeur->UE }}</td>
                                    <td>
                                        <a href="{{ route('professeurs.show', $professeur->id) }}" class="btn btn-info">Voir</a>
                                        <a href="{{ route('professeurs.edit', $professeur->id) }}" class="btn btn-warning">Modifier</a>
                                        <form action="{{ route('professeurs.destroy', $professeur->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce professeur ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
