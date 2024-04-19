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
                            Fiche de gestion N°: {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-4 text-warning">Tout les traitements effectués ici ne concerne
                            que sur cet contrat de gestion</div>
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
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="sbp-preview-content">
                            <div class="row">
                                <div class="col-8">
                                    <!-- Tabbed dashboard card example-->
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="sbp-preview-content">
                                                <div class="row">
                                                    <table class="table table-bordered" style="width: 100%;">
                                                        <tr>
                                                            <th>Code de gestion</th>
                                                            <td>{{ $finds->code }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Bailleur</th>
                                                            <td>{{ $finds->Bailleur->nom }} {{ $finds->Bailleur->prenom }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Téléphone</th>
                                                            <td>{{ $finds->Bailleur->telephone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Code immeuble</th>
                                                            <td>{{ $finds->Immeuble->code }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Adresse</th>
                                                            <td>{{ $finds->Immeuble->adresse }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nombre de locaux</th>
                                                            <td>{{ $finds->Immeuble->nbr_locaux }}</td>
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
                                            <a class="list-group-item list-group-item-action" href="{{ url('Contrat/contrat_bailleur/' . $finds->id) }}">
                                                <i class="fas fa-dollar-sign fa-fw text-blue me-2"></i>
                                                Afficher le contrat
                                            </a>
                                            <a class="list-group-item list-group-item-action"
                                                href="{{ route('Gestion_contrat_bailleur.edit', [$finds->id]) }}">
                                                <i class="fas fa-edit fa-fw text-warning me-2"></i>
                                                Modifier le contrat
                                            </a>
                                            <a class="list-group-item list-group-item-action"
                                                href="#" onclick="return confirm('Voulez vous vraiment supprimer cet element ?')">
                                                <i class="fas fa-close fa-fw text-danger me-2"></i>
                                                Supprimer le contrat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
