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
                            DEPENSES BAILLEUR
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            Effectué des depenses au compte des bailleurs
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
                            <form method="POST" action="{{ route('store_depense_bailleur') }}">
                                @csrf
                                <input type="text" name="users_id" class="form-control" value="{{ Auth::user()->id }}" hidden>
                                <div class="row mt-3">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label>Bailleur concerné</label>
                                            <select name="bailleurs_id" class="form-control js-example-basic-single">

                                            </select>
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
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
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
                            <form action="{{ route('filter_dep_bailleur') }}" method="GET">
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
                                    <th>Bailleur</th>
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
                                        <td>{{ $item->Bailleur->nom }} {{ $item->Bailleur->prenom }}</td>
                                        <td>{{ $item->montant }} FCFA</td>
                                        <td>{{ $item->motif }}</td>
                                        <td class="text-center">
                                            <a class="text-center"
                                                href="">
                                                <i class="me-2 text-green" data-feather="eye"></i>
                                            </a>
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

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                ajax: {
                    url: '/api/search-bailleurs',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term,
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        return {
                            results: $.map(data.items, function(item) {
                                return {
                                    id: item.id,
                                    text: item.nom + ' ' + item.prenom,
                                    nom: item.nom,
                                    prenom: item.prenom,
                                    cnib: item.cnib,
                                    telephone: item.telephone,
                                    profession: item.profession,
                                    quartier: item.quartier,
                                    code: item.code,
                                    adresse: item.adresse,
                                    loyer: item.loyer
                                };
                            }),
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Rechercher un proprietaire...',
                minimumInputLength: 2,
            }).on('select2:select', function(e) {
                var data = e.params.data;
                $('#nom').val(data.nom);
                $('#prenom').val(data.prenom);
                $('#cnib').val(data.cnib);
                $('#telephone').val(data.telephone);
                $('#profession').val(data.profession);
                $('#quartier').val(data.quartier);
                $('#code').val(data.code);
                $('#adresse').val(data.adresse);
                $('#loyer').val(data.loyer);
            });
        });
    </script>
@endsection
