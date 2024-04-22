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
                            GESTION DES CONTRATS
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <h5 class="text-warning">
                                Lorem ipsum dolor sit, amet consectetur adipisicing <br>
                            </h5>
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
                            <form method="POST" action="{{ route('Gestion_contrat_bailleur.store') }}">
                                @csrf
                                <div class="p-2 m-1" style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                    <h6 class="m-2 text-center text-danger">Contrat bailleurs</h6>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label>Bailleurs</label>
                                                <input type="text" name="users_id" class="form-control" value="{{ Auth::user()->id }}" hidden>
                                                <select name="bailleurs_id" class="form-control js-example-basic-single">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label>Immeuble</label>
                                                <select name="immeubles_id" class="form-control js-example-basic-single2">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label>Date d'engagement</label>
                                                <input type="date" name="date" class="form-control">
                                            </div>
                                        </div>
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
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Date</th>
                                    <th>Bailleur</th>
                                    <th>Immeuble</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contrat_bailleurs as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->Bailleur->nom }} {{ $item->Bailleur->prenom }}</td>
                                        <td>{{ $item->Immeuble->adresse }} - {{ $item->Immeuble->nbr_locaux }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('Gestion_contrat_bailleur.show', [$item->id]) }}">
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

<script>
    $(document).ready(function() {
        $('.js-example-basic-single2').select2({
            ajax: {
                url: '/api/search-maisons',
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
                                text: item.id + ' ' + item.type_maison,
                                id: item.id,
                                type_maison: item.type_maison,
                                adresse: item.adresse,
                                loyer: item.loyer,
                                immeubles_id: item.immeubles_id,
                            };
                        }),
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            placeholder: 'Rechercher une maison...',
            minimumInputLength: 2,
        }).on('select2:select', function(e) {
            var data = e.params.data;
            $('#id').val(data.id);
            $('#type_maison').val(data.type_maison);
            $('#adresse').val(data.adresse);
            $('#loyer').val(data.loyer);
            $('#immeubles_id').val(data.immeubles_id);
        });
    });
</script>
@endsection
