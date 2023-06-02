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
            .no-underline {
                text-decoration: none;
            }

            .gray-bg {
                background-color: lightgray;
            }

            .lightgray-bg {
                background-color: #F6F7F7;
            }
            .custom-row {
                height: 50px;
                line-height: 50px; 
            }

        </style>

        <div class="row">
            <div class="col-4">
                <h5>Ajouter un noveau étudiant</h5>
                <a href="{{ route('etudiants.create')}}" class="btn btn-custom btn-primary btn-sm">Ajouter</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Liste des étudiants</h4>
                        <p>Cliquez sur un étudiants pour l'afficher</p>
                    </div>
                    <div class="card-body">
                @foreach($etudiants as $index => $etudiant)
                    <div class="row mb-0 {{ $index % 2 == 0 ? 'gray-bg' : 'lightgray-bg' }} custom-row">
                        <div class="col-12">
                            <a href="{{ route('etudiants.show', $etudiant->id)}}" class="text-dark no-underline">{{$etudiant->nom}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
                </div>   
            </div>
        </div>
@endsection