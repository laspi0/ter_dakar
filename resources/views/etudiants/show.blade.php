@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Détails de l'étudiant</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input disabled type="text" name="nom" id="nom" class="form-control" value="{{ $etudiant->nom }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input disabled type="text" name="prenom" id="prenom" class="form-control" value="{{ $etudiant->prenom }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="matricule">Matricule</label>
                        <input disabled type="text" name="matricule" id="matricule" class="form-control" value="{{ $etudiant->matricule }}" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('etudiants.index') }}" class="btn btn-primary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
