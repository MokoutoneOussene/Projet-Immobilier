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
                            GESTION DES BAILLEURS
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="#!" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#formUserBackdrop">
                                <i class="fas fa-plus"></i>
                                &nbsp; &nbsp; Ajouter un nouveau bailleur
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
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th class="text-center">Code</th>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Prénom</th>
                                    <th class="text-center">Téléphone</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->prenom }}</td>
                                        <td>{{ $item->telephone }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('Gestion_bailleurs.show', [$item->id]) }}">
                                                <i class="me-2 text-green" data-feather="eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formUserBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter une nouvelle location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Tabbed dashboard card example-->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="sbp-preview-content">
                                        <form method="POST" action="{{ route('Gestion_bailleurs.store') }}">
                                            @csrf
                                            <div class="p-2 m-1"
                                                style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                <h6 class="m-2 text-center text-danger">Information sur le bailleur</h6>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="nom"
                                                                placeholder="Henry" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Prénom <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="prenom"
                                                                placeholder="Mitchel" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Date de naissance</label>
                                                            <input class="form-control" type="date"
                                                                name="date_naissance" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Lieu de naissance</label>
                                                            <input class="form-control" type="text" name="lieu" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Profession</label>
                                                            <input class="form-control" type="text" name="profession" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>N° CNIB ou Passport<span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="cnib"
                                                                placeholder="B13649564" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Téléphone<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="telephone"
                                                                placeholder="67186063" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Quartier</label>
                                                            <input class="form-control" type="text" name="quartier"
                                                                placeholder="ex: Wemtenga" />
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
                                                                <input type="checkbox" name="resident"
                                                                    value="non resident">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row p-2 m-1"
                                                style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                <div class="col-lg-12 col-md-12">
                                                    <h6 class="m-2 text-center text-danger">Personne à prévenir en cas de
                                                        besoin</h6>
                                                    <div class="mb-3">
                                                        <label>Nom complet</label>
                                                        <input class="form-control" type="text" name="prevent_name"
                                                            placeholder="Henry mitchel" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>N° Téléphone</label>
                                                        <input class="form-control" type="text" name="prevent_phone"
                                                            placeholder="67186063" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-save"></i>
                                                    &nbsp; &nbsp; Enregistrer
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                    <i class="fas fa-close"></i>
                                                    &nbsp; &nbsp; Fermer
                                                </button>
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
@endsection
