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
                            Fiche du locataire N°: {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-4 text-warning">Tout les traitements effectués ici ne concerne
                            que sur cet locataire</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                            <div class="form-control ps-0 pointer">
                                {{ Carbon\Carbon::now()->format('d-m-Y') }}
                            </div>
                        </div>
                        <div class="mt-3 bg-danger p-2 text-center" style="border-radius: 5px;">
                            <h5 class="text-light mt-1">{{ $total }} FCFA</h5>
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
                                <div class="col-lg-8 col-md-12">
                                    <h4 class="text-center m-3 text-danger">Information sur le locataire</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mr-5">
                                                <p>Nom : <strong>{{ $finds->nom }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Téléphone : <strong>{{ $finds->telephone }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>N° CNIB - Passport : <strong>{{ $finds->cnib }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Situation : <strong>{{ $finds->statut }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Adresse : <strong>{{ $finds->quartier }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Profession : <strong>{{ $finds->profession }}</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mr-5">
                                                <p>Prénom : <strong>{{ $finds->prenom }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Date d'engagement : <strong>{{ $finds->date_amenagement }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Caution electricite : <strong>{{ $finds->caution_electricite }}</strong>
                                                </p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Caution eau : <strong>{{ $finds->caution_eau }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Loyer au prolata : <strong>{{ $finds->prolata }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Caution verse : <strong>{{ $finds->caution_verse }}</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12"
                                            style="border: 2px solid rgb(242, 199, 174); border-radius: 5px; padding-left: 10px;">
                                            <h6 class="m-2 text-center text-danger">Personne à prévenir en cas de besoin
                                            </h6>
                                            <div class="mr-5">
                                                <p>Nom complet : <strong>{{ $finds->prevent_name }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Téléphone : <strong>{{ $finds->prevent_phone }}</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header">Plus d'actions</div>
                                        <div class="list-group list-group-flush small">
                                            <a class="list-group-item list-group-item-action" href="#!">
                                                <i class="fas fa-dollar-sign fa-fw text-blue me-2"></i>
                                                Enregistrer un encaissement
                                            </a>
                                            <a class="list-group-item list-group-item-action" href="{{ url('Contrat/gestion_contrat/' . $finds->id) }}">
                                                <i class="fas fa-tag fa-fw text-purple me-2"></i>
                                                Afficher le contrat
                                            </a>
                                            <a class="list-group-item list-group-item-action" href="{{ route('Gestion_locataires.edit', [$finds->id]) }}">
                                                <i class="fas fa-edit fa-fw text-warning me-2"></i>
                                                Modifier le locataire
                                            </a>
                                            <a class="list-group-item list-group-item-action" href="{{ url('delete_locataire/' . $finds->id) }}">
                                                <i class="fas fa-close fa-fw text-danger me-2"></i>
                                                Supprimer le locataire
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

        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <h4 class="text-center text-danger m-3">LISTE DES PAIEMENTS</h4>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th class="text-center">Code</th>
                                    <th class="text-center">Date encaissement</th>
                                    <th class="text-center">Montant reglé</th>
                                    <th class="text-center">Mois</th>
                                    <th class="text-center">Loyer</th>
                                    <th class="text-center">Adresse</th>
                                    <th class="text-center">Operation terrain</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->date_encaissement }}</td>
                                        <td>{{ $item->montant }}</td>
                                        <td>{{ $item->periode }}</td>
                                        <td>{{ $item->Location->Maison->loyer }}</td>
                                        <td>{{ $item->Location->Maison->adresse }}</td>
                                        <td>{{ $item->operation_terrain == 1 ? "Oui" : "Non" }}</td>
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
