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
                            Fiche de location N°: {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-4 text-warning">Tout les traitements effectués ici ne concerne
                            que sur cette la location</div>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success w-50" href="{{ url('Contrat/gestion_contrat/{id}' . $finds->id) }}">
                                Afficher le contrat
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                            <div class="form-control ps-0 pointer">
                                {{ Carbon\Carbon::now()->format('d-m-Y') }}
                            </div>
                        </div>
                        <a class="btn btn-danger mt-3 w-100" href="#!" data-bs-toggle="modal"
                            data-bs-target="#formUserBackdrop">
                            Resilier le contrat
                        </a>
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
                                <div class="col-lg-6 col-md-12"
                                    style="border: 2px solid rgb(242, 199, 174); border-radius: 5px; padding-left: 10px;">
                                    <h4 class="text-center m-3 text-danger">Locataire</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mr-5">
                                                <p>Code loacataire : <strong>{{ $finds->Locataire->id }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Nom : <strong>{{ $finds->Locataire->nom }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Prénom : <strong>{{ $finds->Locataire->prenom }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Tél : <strong>{{ $finds->Locataire->telephone }}</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mr-5">
                                                <p>Date d'engagement : <strong>{{ $finds->Locataire->date_amenagement }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>N° CNIB - Passport : <strong>{{ $finds->Locataire->cnib }}</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12" style="border: 2px solid rgb(242, 199, 174); border-radius: 5px; padding-left: 10px;">
                                    <h4 class="text-center m-3 text-danger">Maison</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mr-5">
                                                <p>Code immeuble : <strong>{{ $finds->Maison->Immeuble->id }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Type maison : <strong>{{ $finds->Maison->type_maison }}</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mr-5">
                                                <p>Adresse : <strong>{{ $finds->Maison->Immeuble->adresse }}</strong></p>
                                            </div>
                                            <div class="mr-5">
                                                <p>Loyer : <strong>{{ $finds->Maison->loyer }} FCFA</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mr-5">
                                        <p>Caution électricité : <strong>{{ $finds->Locataire->caution_electricite }} FCFA</strong></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mr-5">
                                        <p>Caution eau : <strong>{{ $finds->Locataire->caution_eau }} FCFA</strong></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mr-5">
                                        <p>Louer au prolata : <strong>{{ $finds->Locataire->prolata }} FCFA</strong></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mr-5">
                                        <p>Caution versée : <strong>{{ $finds->Locataire->caution_verse }} FCFA</strong></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mr-5">
                                        <p>Avance versée : <strong>{{ $finds->Locataire->avance }} FCFA</strong></p>
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
