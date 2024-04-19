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
                            Fiche de l'immeuble N°: {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-4 text-warning">Tout les traitements effectués ici ne concerne
                            que sur cet immeuble</div>
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
                            <div class="col-lg-6 col-md-12">
                                <div class="p-2 m-1" style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                    <h6 class="m-2 text-center text-danger">Information sur le bailleur</h6>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="mb-2">
                                            <p>Identifiant : <strong>{{ $finds->Bailleur->id }}</strong></p>
                                        </div>
                                        <div class="mb-2">
                                            <p>Nom : <strong>{{ $finds->Bailleur->nom }}</strong></p>
                                        </div>
                                        <div class="mb-2">
                                            <p>Prénom : <strong>{{ $finds->Bailleur->prenom }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4 mt-4">
                                    <div class="list-group list-group-flush small">
                                        <a class="list-group-item list-group-item-action" href="{{ route('Gestion_immeuble.edit', [$finds->id]) }}">
                                            <i class="fas fa-edit fa-fw text-warning me-2"></i>
                                            Modifier immeuble
                                        </a>
                                        <a class="list-group-item list-group-item-action" href="{{ url('delete_immeubles/' . $finds->id) }}">
                                            <i class="fas fa-close fa-fw text-danger me-2"></i>
                                            Supprimer immeuble
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center m-5">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success w-100" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        Ajouter maison
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="p-2 m-1" style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                    <div class="mb-3">
                                        <p>Adresse : <strong>{{ $finds->adresse }}</strong></p>
                                    </div>
                                    <div class="mb-3">
                                        <p>Nombre de locaux : <strong>{{ $finds->nbr_locaux }}</strong></p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Réference de la parcelle</label>
                                        <textarea cols="30" rows="2" class="form-control" readonly>{{ $finds->reference }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label>Autres information</label>
                                        <textarea cols="30" rows="2" class="form-control" readonly>{{ $finds->autres }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <p>Loyer immeuble : <strong>{{$total}} FCFA</strong></p>
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
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Type de maison</th>
                                    <th>Adresse</th>
                                    <th>Loyer</th>
                                    <th>Situation</th>
                                    <th>Categorie</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($maisons as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->type_maison }}</td>
                                        <td>{{ $item->adresse }}</td>
                                        <td>{{ $item->loyer }} FCFA</td>
                                        <td class="text-danger">{{ $item->situation }}</td>
                                        <td>{{ $item->categorie }}</td>
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter une maison à l'immeuble {{ $finds->id }}
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
                                        <th>Adresse</th>
                                        <th>Type maison</th>
                                        <th>Loyer</th>
                                        <th>Situation</th>
                                        <th>Categorie</th>
                                        <th>Actions</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="form-control" name="adresse" value="{{ $finds->adresse }}"
                                                type="text" readonly />
                                        </td>
                                        <td>
                                            <input class="form-control" name="type_maison" type="text"
                                                placeholder="Ex: Chambre salon" required />
                                        </td>
                                        <td>
                                            <input class="form-control" name="loyer" type="number"
                                                placeholder="Ex: 25000 F" required />
                                        </td>
                                        <td>
                                            <select name="situation" class="form-control">
                                                <option>Selectionner ici...</option>
                                                <option value="Libre">Libre</option>
                                                <option value="Occupée">Occupée</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control" name="immeubles_id" value="{{ $finds->id }}" type="text" hidden />
                                            <input class="form-control" name="categorie" type="text" placeholder="Ras" />
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
