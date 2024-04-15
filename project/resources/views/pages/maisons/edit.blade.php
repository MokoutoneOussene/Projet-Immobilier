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
                            MAISON N° : {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <P>Pour la maison</P>
                            <p>{{ $finds->id }} à {{ $finds->adresse }}</p>
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
                                            <form method="POST" action="{{ route('Gestion_maisons.update', [$finds->id]) }}">
                                                @csrf
                                                @method('PATCH')
                                                <div class="p-2 m-1" style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                <h6 class="m-2 text-center text-danger">Information sur l'immeuble</h6>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Adresse <span class="text-danger">*</span></label>
                                                            <input class="form-control" name="adresse" type="text" value="{{ $finds->adresse }}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Type de maison <span class="text-danger">*</span></label>
                                                            <input class="form-control" name="type_maison" type="text" value="{{ $finds->type_maison }}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Loyer <span class="text-danger">*</span></label>
                                                            <input class="form-control" name="loyer" type="text" value="{{ $finds->loyer }}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label>Situation</label>
                                                        <select name="situation" class="form-control">
                                                            <option>Selectionner ici...</option>
                                                            <option value="Libre">Libre</option>
                                                            <option value="Occupée">Occupée</option>
                                                        </select>
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
