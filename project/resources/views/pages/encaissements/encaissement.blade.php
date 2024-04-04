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
                            <a class="btn btn-success" href="{{ route('Gestion_encaissements.create') }}" class="btn btn-success">
                                Ajouter un nouveau encaissement
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
                        <div
                            style="background: linear-gradient(90deg, rgb(160, 240, 195) 0%, rgb(237, 237, 163) 100%); border-radius: 5px;">
                            <form action="{{ route('date_filter') }}" method="GET">
                                <div class="d-flex justify-content-end mb-3">
                                    <div class="col-3 m-2">
                                        <label>Date debut</label>
                                        <input class="form-control" name="date_debut" type="date" required />
                                    </div>
                                    <div class="col-3 m-2">
                                        <label>Date fin</label>
                                        <input class="form-control" name="date_fin" type="date" required />
                                    </div>
                                    <div class="col-1 m-2 pt-4">
                                        <button type="submit" class="btn btn-success">Filtrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Date</th>
                                    <th>Locataire</th>
                                    <th>Maison</th>
                                    <th>Montant reglé</th>
                                    <th>Mois</th>
                                    <th>Année</th>
                                    <th>OT</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($encaissements as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->date_encaissement }}</td>
                                        <td>{{ $item->Location->Locataire->nom }} {{ $item->Location->Locataire->prenom }}
                                        </td>
                                        <td>{{ $item->Location->Maison->adresse }}</td>
                                        <td>{{ $item->montant }}</td>
                                        <td>{{ $item->periode }}</td>
                                        <td>{{ $item->annee }}</td>
                                        <td>{{ $item->operation_terrain == 1 ? 'Oui' : 'Non' }}</td>
                                        <td class="text-center">
                                            <a class="text-center"
                                                href="{{ route('Gestion_encaissements.show', [$item->id]) }}">
                                                <i class="me-2 text-green" data-feather="eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-9 col-md-6 p-3 bg-secondary">
                                <h4 class="text-light"><strong>TOTAL</strong></h4>
                            </div>
                            <div class="col-lg-3 col-md-6 p-3 bg-danger">
                                <h4 class="text-light"><strong>{{ $total }} FCFA</strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
