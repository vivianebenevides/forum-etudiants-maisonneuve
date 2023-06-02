@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', config('app.name'))
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
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="pt-4 pb-4">Bienvenue dans la base de données des étudiants du Collège Maisonneuve</h3>
                <a href="{{ route('etudiants.index')}}" class="btn btn-custom btn-primary btn-lg">Afficher la liste des étudiants</a>
            </div>
        </div>
@endsection  