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
                background-color: #40B1C0;
                color: white;
                border: white;
            }
            .btn-custom-modifier.btn-primary:hover {
                background-color: navy; 
                color: white;
                border: white;
            }
            .btn-custom-danger.btn-primary:hover {
                background-color: black; 
                color: white;
                border: white;
            }
            .btn-custom-modifier {
                background-color: #40B1C0;
                color: white;
                border: white;
            }
            .btn-custom-danger {
                background-color: red;
                color: white;
                border: red;
            }
        </style>
        <div class="row mt-5">
            <div class="col-12">
                <a href="{{route('etudiants.index')}}" class="btn btn-custom btn-primary btn-sm">Retourner</a>
                <div class="card p-4 mt-4 mb-4 bg-light">
                  <h4 class='display-8 mt-3 pb-3' >
                      {{$etudiants->name}}
                  </h4>
                  <p><strong>Adresse :</strong> {{ $etudiants->adresse }}</p> 
                  <p><strong>Ville :</strong> {{ $etudiants->etudiantHasVille->nom }}</p>  
                  <p><strong>Phone :</strong> {{ $etudiants->phone }}</p>  
                  <p><strong>E-mail :</strong> {{ $etudiants->email }}</p>  
                  <p><strong>Date de naissance :</strong> {{ $etudiants->date_de_naissance }}</p>   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="{{route('etudiants.edit', $etudiants->id)}}" class="btn btn-custom-modifier btn-primary">Modifier</a>
            </div>
            <div class="col-6">
                
                <button type="button" class="btn btn-custom-danger btn-primary" data-bs-toggle="modal" data-bs-target="#modalDelete">
                    Effacer
                </button>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez vous vraimente effacer la donnee : {{ $etudiants->name }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Effacer" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection