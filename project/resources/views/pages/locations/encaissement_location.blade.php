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
                            GESTION DES ENCAISSEMENTS
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <p class="text-warning">Encaissement pour la location N° {{$finds->code}}</p>
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
                                            <form method="POST" action="{{ route('Gestion_encaissements.store') }}">
                                                @csrf
                                                <input type="text" name="users_id" class="form-control"
                                                    value="{{ Auth::user()->id }}" hidden>
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
                                                                <label>Nom</label>
                                                                <input class="form-control" type="text" value="{{$finds->Locataire->nom}}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Prénom</label>
                                                                <input class="form-control" type="text" value="{{$finds->Locataire->prenom}}" readonly />
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
                                                                <label>Téléphone</label>
                                                                <input class="form-control" type="text" id="telephone" value="{{$finds->Locataire->telephone}}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Profession</label>
                                                                <input class="form-control" type="text" id="profession" value="{{$finds->Locataire->profession}}" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Quartier</label>
                                                                <input class="form-control" type="text" id="quartier" value="{{$finds->Locataire->quartier}}" readonly />
                                                            </div>
                                                        </div>
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
                                                            <label>Montant encaisée</label>
                                                            <input class="form-control" name="montant" type="number" value="{{$finds->Maison->loyer}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Periode</label>
                                                            <select class="form-control" name="periode" id="">
                                                                <option value="Janvier">Janvier</option>
                                                                <option value="Février">Février</option>
                                                                <option value="Mars">Mars</option>
                                                                <option value="Avril">Avril</option>
                                                                <option value="Mai">Mai</option>
                                                                <option value="Juin">Juin</option>
                                                                <option value="Juillet">Juillet</option>
                                                                <option value="Aout">Aout</option>
                                                                <option value="Septembre">Septembre</option>
                                                                <option value="Octobre">Octobre</option>
                                                                <option value="Novembre">Novembre</option>
                                                                <option value="Décembre">Décembre</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Année</label>
                                                            <select class="form-control" name="annee">
                                                                <option>Selectionner ici</option>
                                                                <?php $years = range(2023, strftime('%Y', time())); ?>
                                                                <?php foreach($years as $year) : ?>
                                                                <option value="<?php echo $year; ?>"><?php echo $year; ?>
                                                                </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label class="container">Operation terrain
                                                                <input type="checkbox" name="operation_terrain"
                                                                    value="1">
                                                                <span class="checkmark"></span>
                                                            </label>
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
