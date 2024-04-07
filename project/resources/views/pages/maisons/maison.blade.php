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
                            GESTION DES MAISONS
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="#!" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#formMaisonBackdrop">
                                Ajouter une maison
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
                                    <th>Code</th>
                                    <th>Proprietaire</th>
                                    <th>Type de maison</th>
                                    <th>Adresse</th>
                                    <th>Loyer</th>
                                    <th>Situation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->Immeuble->Bailleur->nom }} {{ $item->Immeuble->Bailleur->prenom }}</td>
                                        <td>{{ $item->type_maison }}</td>
                                        <td>{{ $item->adresse }}</td>
                                        <td>{{ $item->loyer }} FCFA</td>
                                        <td class="text-danger">{{ $item->situation }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('Gestion_maisons.show', [$item->id]) }}"><i
                                                    class="me-2 text-green" data-feather="eye"></i></a>
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
<div class="modal fade" id="formMaisonBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
                <div class="col-lg-12 col-md-12">
                    <form action="{{ route('Gestion_maisons.store') }}" method="POST">
                        @csrf
                        <table class="table table-responsive table-bordered">
                            <tr>
                                <th>Immeuble</th>
                                <th>Adresse</th>
                                <th>Type maison</th>
                                <th>Loyer</th>
                                <th>Situation</th>
                                <th>Categorie</th>
                                <th>Actions</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="immeubles_id" class="form-control">
                                        <option>Selectionner ici...</option>
                                        @foreach ($immeubles as $item)
                                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->adresse }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" name="adresse" type="text" />
                                </td>
                                <td>
                                    <input class="form-control" name="type_maison" type="text" placeholder="Ex: Chambre salon" required />
                                </td>
                                <td>
                                    <input class="form-control" name="loyer" type="number" placeholder="Ex: 25000 F" required />
                                </td>
                                <td>
                                    <select name="situation" class="form-control">
                                        <option>Selectionner ici...</option>
                                        <option value="Libre">Libre</option>
                                        <option value="Occupée">Occupée</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" name="categorie" type="text" placeholder="Ras"/>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-success" type="button" name="add" id="add">Add</button>
                                </td>
                            </tr>
                        </table>
                        <div class="m-3">
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
@endsection
