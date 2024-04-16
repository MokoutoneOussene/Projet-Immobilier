@extends('layouts.master')
@section('content')
    <header class="page-header page-header-dark pb-10"
        style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 100%);">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            Fiche de la maison N°: {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-4 text-warning">Tout les traitements effectués ici ne concerne
                            que sur cette maison</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                            <div class="form-control ps-0 pointer">
                                {{ Carbon\Carbon::now()->format('d-m-Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-8">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="sbp-preview-content">
                            <div class="row">
                                <table class="table table-bordered" style="width: 100%;">
                                    <tr>
                                        <th>Code maison</th>
                                        <td>{{ $finds->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Adresse</th>
                                        <td>{{ $finds->adresse }}</td>
                                    </tr>
                                    <tr>
                                        <th>Loyer</th>
                                        <td>{{ $finds->loyer }}</td>
                                    </tr>
                                    <tr>
                                        <th>Type de maison</th>
                                        <td>{{ $finds->type_maison }}</td>
                                    </tr>
                                    <tr>
                                        <th>Categorie</th>
                                        <td>{{ $finds->categorie }}</td>
                                    </tr>
                                    <tr>
                                        <th>Proprietaire</th>
                                        <td>{{ $finds->Immeuble->Bailleur->nom }} {{ $finds->Immeuble->Bailleur->prenom }}</td>
                                    </tr>
                                    <tr>
                                        <th>Situation</th>
                                        <td>{{ $finds->situation }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-header text-center">Plus d'actions</div>
                    <div class="list-group list-group-flush small">
                        <a class="list-group-item list-group-item-action" href="{{ route('Gestion_maisons.edit', [$finds->id]) }}">
                            <i class="fas fa-edit fa-fw text-warning me-2"></i>
                            Modifier la maison
                        </a>
                        <a class="list-group-item list-group-item-action" href="{{ url('delete_maison/' . $finds->id) }}">
                            <i class="fas fa-close fa-fw text-danger me-2"></i>
                            Supprimer la maison
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
