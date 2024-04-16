@extends('layouts.master')
@section('content')
    <header class="page-header page-header-dark pb-10" style="background: rgb(129, 56, 56)">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            LOCATAIRE N° : {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <P>Pour le locataire</P>
                            <p>{{ $finds->nom }} {{ $finds->prenom }}</p>
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
                                            <form method="POST" action="{{ route('Gestion_locataires.update', [$finds->id]) }}">
                                                @csrf
                                                @method('PATCH')
                                                <div class="p-2 m-1" style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                    <h6 class="m-2 text-center text-danger">Information sur le locataire</h6>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Nom <span class="text-danger">*</span></label>
                                                                <input class="form-control" name="nom" type="text" value="{{ $finds->nom }}" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Prénom <span class="text-danger">*</span></label>
                                                                <input class="form-control" name="prenom" type="text" value="{{ $finds->prenom }}" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label>N° CNIB ou Passport<span class="text-danger">*</span></label>
                                                                <input class="form-control" name="cnib" type="text" value="{{ $finds->cnib }}" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Téléphone<span class="text-danger">*</span></label>
                                                                <input class="form-control" name="telephone" type="text" value="{{ $finds->telephone }}" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Quartier</label>
                                                                <input class="form-control" name="quartier" type="text" value="{{ $finds->quartier }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Proffession</label>
                                                                <input class="form-control" name="profession" type="text" value="{{ $finds->profession }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row p-2 m-1" style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                    <h6 class="m-2 text-center text-danger">Information sur la caution</h6>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Caution électricité</label>
                                                            <input class="form-control" name="caution_electricite" type="number" value="{{ $finds->caution_electricite }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Louer au prolata</label>
                                                            <input class="form-control" name="prolata" type="number" value="{{ $finds->prolata }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Caution eau</label>
                                                            <input class="form-control" name="caution_eau" type="number" value="{{ $finds->caution_eau }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Caution versée</label>
                                                            <input class="form-control" name="caution_verse" type="number" value="{{ $finds->caution_verse }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row p-2 m-1 d-flex justify-content-between" style="border: 2px solid rgb(184, 158, 201); border-radius: 5px;">
                                                    <div class="col-lg-3 col-md-12"
                                                        style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                        <h6 class="m-2 text-center text-danger">Situation</h6>
                                                        <div class="mb-3">
                                                            <label class="container">En attente
                                                                <input type="radio" name="statut" checked="checked" value="En attente">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="container">Sous contrat
                                                                <input type="radio" name="statut" value="Sous contrat">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="container">Résilié
                                                                <input type="radio" name="statut" value="Résilié">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-12" style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                        <h6 class="m-2 text-center text-danger">Personne à prévenir en cas de besoin</h6>
                                                        <div class="mb-3">
                                                            <label>Nom complet</label>
                                                            <input class="form-control" name="prevent_name" type="text" value="{{$finds->prevent_name}}" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>N° Téléphone</label>
                                                            <input class="form-control" name="prevent_phone" type="number" value="{{$finds->prevent_phone}}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="submit" class="btn btn-success">Modifier</button>
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
