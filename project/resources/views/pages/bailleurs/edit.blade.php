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
                            PROPRIETAIRE N° : {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <P>Pour le proprietaire</P>
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
                                            <form method="POST" action="{{ route('Gestion_bailleurs.update', [$finds->id]) }}">
                                                @csrf
                                                @method('PATCH')
                                                <div class="p-2 m-1"
                                                    style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                    <h6 class="m-2 text-center text-danger">Information sur le bailleur</h6>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Nom <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="nom" value="{{ $finds->nom }}" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Prénom <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="prenom" value="{{ $finds->prenom }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Date de naissance</label>
                                                                <input class="form-control" type="date" name="date_naissance" value="{{ $finds->date_naissance }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Lieu de naissance</label>
                                                                <input class="form-control" type="text" name="lieu" value="{{ $finds->lieu }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Profession</label>
                                                                <input class="form-control" type="text" name="profession" value="{{ $finds->profession }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>N° CNIB ou Passport<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="cnib" value="{{ $finds->cnib }}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Téléphone<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="telephone" value="{{ $finds->telephone }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Quartier</label>
                                                                <input class="form-control" type="text" name="quartier" value="{{ $finds->quartier }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label class="container">Resident
                                                                    <input type="checkbox" name="resident" value="resident">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="container">Non Resident
                                                                    <input type="checkbox" name="resident" value="non resident">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row p-2 m-1"
                                                    style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                    <div class="col-lg-12 col-md-12">
                                                        <h6 class="m-2 text-center text-danger">Personne à prévenir en cas de besoin</h6>
                                                        <div class="mb-3">
                                                            <label>Nom complet</label>
                                                            <input class="form-control" type="text" name="prevent_name" value="{{ $finds->prevent_name }}"/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>N° Téléphone</label>
                                                            <input class="form-control" type="text" name="prevent_phone" value="{{ $finds->prevent_phone }}"/>
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
