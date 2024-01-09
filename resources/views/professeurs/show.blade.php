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
                        <input disabled type="text" name="nom" id="nom" class="form-control" value="{{ $professeur->nom }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input disabled type="text" name="prenom" id="prenom" class="form-control" value="{{ $professeur->prenom }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="matricule">UE</label>
                        <input disabled type="text" name="UE" id="UE" class="form-control" value="{{ $professeur->UE }}" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('professeurs.index') }}" class="btn btn-primary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
