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
                            Fiche de la resiliation N°: {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-4 text-warning">Tout les traitements effectués ici ne concerne
                            que sur cette resiliation
                        </div>
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
                                        <td class="text-center text-danger" colspan="2">Informations du locataire</td>
                                    </tr>
                                    <tr>
                                        <th>Code loacataire</th>
                                        <td>{{ $finds->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Locataire</th>
                                        <td>{{ $finds->Location->Locataire->nom }} {{ $finds->Location->Locataire->prenom }}</td>
                                    </tr>
                                    <tr>
                                        <th>Téléphone</th>
                                        <td>{{ $finds->Location->Locataire->telephone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date d'engagement</th>
                                        <td>{{ $finds->Location->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center text-danger" colspan="2">Information de la maison</td>
                                    </tr>
                                    <tr>
                                        <th>Code</th>
                                        <td>{{ $finds->Location->Maison->code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Adresse</th>
                                        <td>{{ $finds->Location->Maison->adresse }}</td>
                                    </tr>
                                    <tr>
                                        <th>Type de la maison</th>
                                        <td>{{ $finds->Location->Maison->type_maison }}</td>
                                    </tr>
                                    <tr>
                                        <th>Loyer</th>
                                        <td>{{ $finds->Location->Maison->loyer }} FCFA</td>
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
                        <a class="list-group-item list-group-item-action" href="{{ url('print_resiliation/' . $finds->id) }}">
                            <i class="fas fa-print fa-fw text-success me-2"></i>
                            Imprimer la resiliation
                        </a>
                        <a class="list-group-item list-group-item-action"
                            href="">
                            <i class="fas fa-close fa-fw text-danger me-2"></i>
                            Supprimer la location
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
