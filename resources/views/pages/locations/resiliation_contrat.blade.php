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
                            RESILIATION DE LOCATION
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <p class="text-warning">Resiliation pour la location N° {{$finds->code}}</p>
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
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Tabbed dashboard card example-->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="sbp-preview-content">
                                            <form method="POST" action="{{ route('resiliation') }}">
                                                @csrf
                                                <div class="p-2 m-1"
                                                    style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                    <h6 class="m-2 text-center text-danger">Information sur la location</h6>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="mb-3">
                                                                <input name="locations_id" class="form-control" value="{{$finds->id}}" hidden>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label class="text-danger">Caution versée</label>
                                                                <input class="form-control" type="text" value="{{$finds->Locataire->caution_verse}}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Locataire</label>
                                                                <input class="form-control" type="text" value="{{$finds->Locataire->nom}} {{$finds->Locataire->prenom}}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>N° CNIB ou Passport</label>
                                                                <input class="form-control" type="text" value="{{$finds->Locataire->cnib}}" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Code maison</label>
                                                                <input class="form-control" type="text" value="{{$finds->Maison->code}}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Adresse maison</label>
                                                                <input class="form-control" type="text" value="{{$finds->Maison->adresse}}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Loyer maison</label>
                                                                <input class="form-control" type="text" value="{{$finds->Maison->loyer}}" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Mois du</label>
                                                            <input type="number" name="last_mois" class="form-control" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Refection peinture</label>
                                                            <input type="number" name="refec_peinture" class="form-control" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Refection plomberie</label>
                                                            <input type="number" name="refec_plomberie" class="form-control" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label class="container">Travaux d'electricite</label>
                                                            <input type="number" name="trav_electricite" class="form-control" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label class="container">Redevence sonabel</label>
                                                            <input type="number" name="redev_sonabel" class="form-control" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label class="container">Facture onea</label>
                                                            <input type="number" name="facture_onea" class="form-control" placeholder="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="submit" class="btn btn-success">Enregistrer</button>
                                                </div>
                                            </form>
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
