@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des matières</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('matieres.create') }}" class="btn btn-primary mb-3 float-end">Ajouter une matière</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th class="float-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matieres as $matiere)
                                <tr>
                                    <td>{{ $matiere->id }}</td>
                                    <td>{{ $matiere->nom }}</td>
                                    <td>
                                        <div class="float-end">
                                            <a href="{{ route('matieres.edit', $matiere->id) }}" class="btn btn-warning">Modifier</a>
                                        <form action="{{ route('matieres.destroy', $matiere->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette matière ?')">Supprimer</button>
                                        </form> 
                                        </div>
                                       
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
