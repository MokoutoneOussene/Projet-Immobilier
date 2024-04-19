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
                            PROPRIETAIRE N° : 
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="{{ route('Gestion_paiements.index') }}" class="btn btn-success">
                                Liste des paiements
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
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Tabbed dashboard card example-->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="sbp-preview-content">
                                            <form method="POST" action="{{ route('Gestion_paiements.store') }}">
                                                @csrf
                                                <div class="p-2 m-1" style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Personnel <span class="text-danger">*</span></label>
                                                                <select name="users_id" class="form-control">
                                                                    @foreach ($collection as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->nom }} {{ $item->prenom }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <label>Date de paiement</label>
                                                            <input type="text" class="form-control" value="{{date('d-m-Y')}}" readonly>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <label>Mois concerné</label>
                                                            <select class="form-control" name="periode">
                                                                <option value="Janvier">Janvier</option>
                                                                <option value="Février">Février</option>
                                                                <option value="Mars">Mars</option>
                                                                <option value="Avril">Avril</option>
                                                                <option value="Mai">Mai</option>
                                                                <option value="Juin">Juin</option>
                                                                <option value="Juillet">Juillet</option>
                                                                <option value="Aout">Aout</option>
                                                                <option value="Septembre">Septembre</option>
                                                                <option value="Octobre">Octobre</option>
                                                                <option value="Novembre">Novembre</option>
                                                                <option value="Décembre">Décembre</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Année</label>
                                                                <select class="form-control" name="annee">
                                                                    <option>Selectionner ici</option>
                                                                    <?php $years = range(2024, strftime('%Y', time())); ?>
                                                                    <?php foreach($years as $year) : ?>
                                                                    <option value="<?php echo $year; ?>"><?php echo $year; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <label>Montant</label>
                                                            <input type="number" name="montant" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <label>Bonus</label>
                                                            <input type="number" name="bonus" class="form-control">
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
    </div>
@endsection
