@extends('layouts.master')

@section('content')
    @include('require.header')
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-4">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Nombre de locataire</div>
                                <div class="text-lg fw-bold">{{ $locataires->count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="user"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="{{ route('Gestion_locataires.index') }}">Voir plus</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->role !== 'Recouvrement')
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card bg-warning text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-white-75 small">Nombre de contrats</div>
                                    <div class="text-lg fw-bold">{{ $locat_contrat->count() }}</div>
                                </div>
                                <i class="feather-xl text-white-50" data-feather="calendar"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="text-white stretched-link" href="{{ route('Gestion_location.index') }}">Voir plus</a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role == 'Privilege' || Auth::user()->role == 'Secretaire')
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card bg-danger text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-white-75 small">Total des maisons</div>
                                    <div class="text-lg fw-bold">{{ $maisons_all->count() }}</div>
                                </div>
                                <i class="feather-xl text-white-50" data-feather="home"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="text-white stretched-link" href="{{ route('Gestion_maisons.index') }}">Voir plus</a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-white-75 small">Total des maison libre</div>
                                    <div class="text-lg fw-bold">{{ $maisons_libre->count() }}</div>
                                </div>
                                <i class="feather-xl text-white-50" data-feather="home"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="text-white stretched-link" href="{{ route('maison_libre') }}">Voir plus</a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- Example Charts for Dashboard Demo-->
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card lift h-100" style="background: linear-gradient(90deg, rgb(181, 233, 233) 0%, rgb(251, 252, 252) 100%);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center text-center">
                            <div class="col-lg-4 col-md-12">
                                <div class="mb-2">
                                    <h6 class="text-uppercase">Nombre encaissement du jours</h6>
                                    <div class="text-muted small">
                                        <h1 class="text-primary mt-5" style="font-size: 20px; font-weight: bold;">{{ $encaissements->count() }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="mb-2">
                                    <h6 class="text-uppercase">Total encaissement du jours</h6>
                                    <div class="text-muted small">
                                        <h1 class="text-primary mt-5" style="font-size: 20px; font-weight: bold;">{{ $total }} FCFA</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <img src="{{ asset('asset/assets/img/illustrations/browser-stats.svg') }}" alt="images" style="width: 8rem" />
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
                                    <th>Date</th>
                                    <th>Locataire</th>
                                    <th>Maison</th>
                                    <th>Montant reglé</th>
                                    <th>Mois</th>
                                    <th>Année</th>
                                    <th>Receveur</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($encaissements as $item)
                                <tr>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->date_encaissement }}</td>
                                    <td>{{ $item->Location->Locataire->nom }}  {{ $item->Location->Locataire->prenom }}</td>
                                    <td>{{ $item->Location->Maison->adresse }}</td>
                                    <td>{{ $item->montant }}</td>
                                    <td>{{ $item->periode }}</td>
                                    <td>{{ $item->annee }}</td>
                                    <td>{{ $item->User->nom }} {{ $item->User->prenom }}</td>
                                    <td class="text-center">
                                        <a class="text-center" href="{{ route('Gestion_encaissements.show', [$item->id]) }}">
                                            <i class="me-2 text-green" data-feather="eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-9 col-md-6 p-3" style="background: rgb(50, 49, 49)">
                                <h4 class="text-light"><strong>TOTAL</strong></h4>
                            </div>
                            <div class="col-lg-3 col-md-6 p-3 bg-danger">
                                <h4 class="text-light"><strong>{{$total}} FCFA</strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
