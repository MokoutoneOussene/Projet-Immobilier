@extends('layouts.master')
@section('content')
    <header class="page-header page-header-dark pb-10" style="background: rgb(129, 56, 56)">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            GESTION DES LOCATAIRES
                        </h1>
                        @if (Auth::user()->role == 'Privilege' || Auth::user()->role == 'Secretaire')
                            <div class="page-header-subtitle mt-3">
                                <a class="btn btn-success" href="#!" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#formLocataireBackdrop">
                                    Ajouter un locataire
                                </a>
                            </div>
                        @endif
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
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->prenom }}</td>
                                        <td>{{ $item->telephone }}</td>
                                        <td class="text-center">
                                            <a class="text-center" href="{{ route('Gestion_locataires.show', [$item->id]) }}">
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
    <div class="modal fade" id="formLocataireBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter une maison à l'immeuble
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Tabbed dashboard card example-->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="sbp-preview-content">
                                        <form method="POST" action="{{ route('Gestion_locataires.store') }}">
                                            @csrf
                                            <div class="p-2 m-1" style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                <h6 class="m-2 text-center text-danger">Information sur le locataire</h6>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" name="nom" type="text" placeholder="Henry" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Prénom <span class="text-danger">*</span></label>
                                                            <input class="form-control" name="prenom" type="text" placeholder="Mitchel" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>N° CNIB ou Passport<span class="text-danger">*</span></label>
                                                            <input class="form-control" name="cnib" type="text" placeholder="B13649564" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Téléphone<span class="text-danger">*</span></label>
                                                            <input class="form-control" name="telephone" type="text" placeholder="67186063" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Quartier</label>
                                                            <input class="form-control" name="quartier" type="text" placeholder="ex: Wemtenga" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Proffession</label>
                                                            <input class="form-control" name="profession" type="text" placeholder="ex: fonctionnaire d'etat" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row p-2 m-1" style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                <h6 class="m-2 text-center text-danger">Information sur la caution</h6>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Caution électricité</label>
                                                        <input class="form-control" name="caution_electricite" type="number" placeholder="0" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Louer au prolata</label>
                                                        <input class="form-control" name="prolata" type="number" placeholder="0" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Caution eau</label>
                                                        <input class="form-control" name="caution_eau" type="number" placeholder="0" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Caution versée</label>
                                                        <input class="form-control" name="caution_verse" type="number" placeholder="0" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row p-2 m-1 d-flex justify-content-between"
                                                style="border: 2px solid rgb(184, 158, 201); border-radius: 5px;">
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
                                                        <input class="form-control" name="prevent_name" type="text" placeholder="Henry mitchel" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>N° Téléphone</label>
                                                        <input class="form-control" name="prevent_phone" type="number" placeholder="67186063" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-success">Enregistrer</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
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
