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
                            GESTION DES IMMEUBLES
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="{{ route('Gestion_immeuble.index') }}" class="btn btn-success">
                                <i data-feather="grid"></i>
                                &nbsp; &nbsp; Liste des immeubles
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
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Tabbed dashboard card example-->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="sbp-preview-content">
                                    <form method="POST" action="{{ route('Gestion_immeuble.store') }}">
                                        @csrf
                                        <div class="p-2 m-1"
                                            style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                            <h6 class="m-2 text-center text-danger">Information sur l'immeuble</h6>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Nom du bailleur<span class="text-danger">*</span></label>
                                                        <select name="bailleurs_id"
                                                            class="form-control js-example-basic-single">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Adresse <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="adresse" type="text"
                                                            placeholder="Ex: Zagtouli" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Nombre de locaux<span class="text-danger">*</span></label>
                                                        <input class="form-control" name="nbr_locaux" type="number"
                                                            required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Référence de la parcelle</label>
                                                        <textarea name="reference" class="form-control" cols="30" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Autres informations</label>
                                                        <textarea name="autres" class="form-control" cols="30" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-save"></i>
                                                &nbsp; &nbsp; Enregistrer
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
