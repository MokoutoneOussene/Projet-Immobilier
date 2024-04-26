@extends('layouts.master')
@section('content')
    <header class="page-header page-header-dark pb-10" style="background: rgb(129, 56, 56)">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            Fiche du locataire N°: {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-4">Tout les traitements effectués ici ne concerne
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
                                        <table class="table table-bordered" style="width: 100%;">
                                            <tr>
                                                <th>Code locataire</th>
                                                <td>{{ $finds->id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nom</th>
                                                <td>{{ $finds->nom }} {{ $finds->prenom }}</td>
                                            </tr>
                                            <tr>
                                                <th>CNIB ou Passport</th>
                                                <td>{{ $finds->cnib }}</td>
                                            </tr>
                                            <tr>
                                                <th>Téléphone</th>
                                                <td>{{ $finds->telephone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Quartier</th>
                                                <td>{{ $finds->quartier }}</td>
                                            </tr>
                                            <tr>
                                                <th>Situation</th>
                                                <td>{{ $finds->statut }}</td>
                                            </tr>
                                            <tr>
                                                <th>Profession</th>
                                                <td>{{ $finds->profession }}</td>
                                            </tr>
                                            <tr>
                                                <th>Caution electricite</th>
                                                <td>{{ $finds->caution_electricite }}</td>
                                            </tr>
                                            <tr>
                                                <th>Caution eau</th>
                                                <td>{{ $finds->caution_eau }}</td>
                                            </tr>
                                            <tr>
                                                <th>Loyer au prolata</th>
                                                <td>{{ $finds->prolata }}</td>
                                            </tr>
                                            <tr>
                                                <th>Caution verse</th>
                                                <td>{{ $finds->caution_verse }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center text-danger" colspan="2">Personne a prevenir en cas de besoin</td>
                                            </tr>
                                            <tr>
                                                <th>Nom & prénom</th>
                                                <td>{{ $finds->prevent_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Téléphone</th>
                                                <td>{{ $finds->prevent_phone }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header">Plus d'actions</div>
                                        <div class="list-group list-group-flush small">
                                            @if (Auth::user()->role == 'Privilege' || Auth::user()->role == 'Secretaire')
                                                <a class="list-group-item list-group-item-action" href="{{ route('Gestion_locataires.edit', [$finds->id]) }}">
                                                    <i class="fas fa-edit fa-fw text-warning me-2"></i>
                                                    Modifier le locataire
                                                </a>
                                            @endif
                                            @if (Auth::user()->role == 'Privilege')
                                                <a class="list-group-item list-group-item-action" href="{{ url('delete_locataire/' . $finds->id) }}" onclick="return confirm('Voulez vous vraiment supprimer cet element ?')">
                                                    <i class="fas fa-close fa-fw text-danger me-2"></i>
                                                    Supprimer le locataire
                                                </a>
                                            @endif
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
                    <h4 class="text-center text-danger m-3">SUIVI DES PAIEMENTS</h4>
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
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
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
