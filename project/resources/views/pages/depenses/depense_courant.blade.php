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
                            DEPENSES COURANTES
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            Effectué des depense courantes au compte de l'agence
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
                        <div class="sbp-preview-content">
                            <form method="POST" action="{{ route('Gestion_depense_courant.store') }}">
                                @csrf
                                <input type="text" name="users_id" class="form-control" value="{{ Auth::user()->id }}"
                                    hidden>
                                <div class="row mt-3">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label>Personne bénéficière</label>
                                            <input class="form-control" name="beneficier" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label>Montant de la dépense</label>
                                            <input class="form-control" name="montant" type="number" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label>Date de la depense</label>
                                            <input class="form-control" type="text" value="{{ date('d-m-Y') }}" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <label>Motif de la depense</label>
                                        <textarea name="motif" class="form-control" rows="3"></textarea>
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

        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <div
                            style="background: linear-gradient(90deg, rgb(164, 216, 231) 0%, rgb(198, 233, 175) 100%); border-radius: 5px;">
                            <form action="{{ route('depense_date_filter') }}" method="GET">
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
                                    <th>Beneficier(e)</th>
                                    <th>Montant</th>
                                    <th>Motif</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($depenses as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $item->beneficier }}</td>
                                        <td>{{ $item->montant }} FCFA</td>
                                        <td>{{ $item->motif }}</td>
                                        <td class="text-center">
                                            <a class="text-center" href="#!" data-bs-toggle="modal"
                                                data-bs-target="#showDepenseBackdrop{{ $item->id }}">
                                                <i class="me-2 text-green" data-feather="eye"></i>
                                            </a>
                                            <!-- Modal show -->
                                            <div class="modal fade" id="showDepenseBackdrop{{ $item->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Detail de depense {{ $item->code }}</h5>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <!-- Tabbed dashboard card example-->
                                                                    <div class="card mb-4">
                                                                        <div class="card-body">
                                                                            <div class="sbp-preview-content">
                                                                                <table class="table table-bordered">
                                                                                    <tr>
                                                                                        <th class="text-center">Identifiant</th>
                                                                                        <th class="text-center">Beneficier(e)</th>
                                                                                        <th class="text-center">Motif</th>
                                                                                        <th class="text-center">Montant</th>
                                                                                        <th class="text-center">Date</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="150">{{ $item->code }}</td>
                                                                                        <td>{{ $item->beneficier }}</td>
                                                                                        <td>{{ $item->motif }}</td>
                                                                                        <td>{{ $item->montant }} FCFA</td>
                                                                                        <td>{{ $item->date }}</td>
                                                                                    </tr>
                                                                                </table>
                                                                                <div class="d-flex justify-content-end">
                                                                                    <h6>Operation effectué : {{ $item->User->nom }} {{ $item->User->prenom }}</h6>
                                                                                </div>
                                                                                <div class="mt-3">
                                                                                    <a href="" type="button"
                                                                                        class="btn btn-success">
                                                                                        <i class="fas fa-print" style="margin-right: 5px;"></i>
                                                                                        Ipprimer
                                                                                    </a>
                                                                                    <button type="button" class="btn btn-danger"
                                                                                        data-bs-dismiss="modal">Fermer</button>
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-9 col-md-6 p-3 bg-dark">
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
