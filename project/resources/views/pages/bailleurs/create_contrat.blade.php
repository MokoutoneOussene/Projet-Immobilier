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
                            CONTRAT DE GESTION
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            Pour le prorietaire N° {{$finds->code}} <br>
                            {{$finds->nom}} {{$finds->prenom}}
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
                                                            <input type="text" name="bailleurs_id" class="form-control" value="{{$finds->id}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Immeuble</label>
                                                            <select name="immeubles_id" class="form-control">
                                                                <option value="">Selectionner ici...</option>
                                                                @foreach ($immeubles as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->adresse }}</option>
                                                                @endforeach
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
                </div>
            </div>
        </div>
    </div>
@endsection
