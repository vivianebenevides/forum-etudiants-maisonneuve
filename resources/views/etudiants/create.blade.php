@extends('layouts.app')
@section('title', 'Liste des étudiants')
@section('titleHeader', 'Étudiants')
@section('content')
    <style>
            .btn-custom {
                background-color: navy;
                color: white;
                border: navy;
            }
            .btn-custom.btn-primary:hover {
                background-color: #40B1C0; /* Cor de fundo do btn-primary */
                color: white;
                border: white;
            }
    </style>
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <div class="card">
                <form method="post">
                    @csrf
                    <div class="card-header">
                        <h5>Inserer un noveau étudiant</h5>
                    </div>
                    <div class="card-body">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" 
                        class="form-control">

                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" 
                        class="form-control">

                        <label for="ville">Ville</label>
                        <select name="ville_id" id="ville" class="form-control">
                            @foreach($villes as $ville)
                            <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endforeach
                        </select>

                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" 
                        class="form-control">

                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" 
                        class="form-control">

                        <label for="date-de-naissance">Date de naissance</label>
                        <input type="date" id="date-de-naissance" name="date-de-naissance" 
                        class="form-control">
                        
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-custom btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection