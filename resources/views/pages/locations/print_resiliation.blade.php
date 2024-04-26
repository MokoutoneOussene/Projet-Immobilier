<!DOCTYPE html>
<html lang="fr">

<head>
    @include('partials.meta')
    @yield('title')
    <title>Gestion Immobilier</title>
    @yield('style')
    @include('partials.style')
    <style>
        .inset-0 {
            z-index: 999999999 !important;
        }
    </style>

<body class="nav-fixed" style="height: 90vh;">
    <div class="container-fluid mt-1">
        <div style="border-bottom: 1px solid black;">
            <div class="d-flex col-md-12">
                <div class="col-3 mt-3">
                    <img src="{{ asset('images/logo.png') }}" style="width: 35%;" alt="Bassem_logo Logo">
                </div>
                <div class="col-9">
                    <h1 class="text-center" style="font-size: 25px;">
                        <strong>AGENCE IMMOBILIERE BASSEM-YAM</strong>
                    </h1>
                    <h6 class="text-center">LOCATION - ACHAT - VENTE - GESTION IMMOBILIERE</h6>
                    <h5>Située à Ouagadougou secteur 28 (Coté Est de la pédiatrie Charles de Gaule)</h5>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <p>Tel : 25 36 50 81 / 70 24 04 65 / 78 20 01 70 | email : info@bassem-yam.com</p>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <h5>Ouagadougou, le {{ $finds->created_at->format('d-m-Y') }}</h5>
        </div>
        <p class="mt-2">
            Chez Mr, Mmme: <strong>{{$finds->Location->Maison->Immeuble->Bailleur->nom}} {{$finds->Location->Maison->Immeuble->Bailleur->prenom}}</strong>
        </p>
        <p class="mt-2">Cole du contrat : <strong>{{$finds->Location->code}}</strong></p>
        <h3 class="m-4 text-center">SITUATION DE CAUTION DE {{$finds->Location->Locataire->nom}} {{$finds->Location->Locataire->prenom}}</h3>

        <table class="table table-bordered">
            <tr style="background: rgb(202, 200, 200)">
                <th class="text-center">Caution versée</th>
                <th class="text-center">{{$finds->Location->Locataire->caution_verse}}</th>
            </tr>
            <tr>
                <td>Mois du</td>
                <td class="text-center">{{ $finds->last_mois }}</td>
            </tr>
            <tr>
                <td>Réfection peinture</td>
                <td class="text-center">{{ $finds->refec_peinture }}</td>
            </tr>
            <tr>
                <td>Plomberie</td>
                <td class="text-center">{{ $finds->refec_plomberie }}</td>
            </tr>
            <tr>
                <td>Travaux d'electricité</td>
                <td class="text-center">{{ $finds->trav_electricite }}</td>
            </tr>
            <tr>
                <td>Redevance SONABEL</td>
                <td class="text-center">{{ $finds->redev_sonabel }}</td>
            </tr>
            <tr>
                <td>Facture ONEA</td>
                <td class="text-center">{{ $finds->facture_onea }}</td>
            </tr>
            <tr style="background: rgb(202, 200, 200)">
                <th>Total dépense</th>
                <th class="text-center">{{ $finds->facture_onea+$finds->redev_sonabel+$finds->trav_electricite+$finds->refec_plomberie+$finds->refec_peinture+$finds->last_mois }}</th>
            </tr>
            <tr style="background: rgb(202, 200, 200)">
                <th>Somme restante pour le locataire</th>
                <th class="text-center">{{ $finds->restant }}</th>
            </tr>
        </table>
        <p>
            Je sousigné, {{$finds->Location->Locataire->nom}} {{$finds->Location->Locataire->prenom}} 
            CNIB ou Passport N° {{ $finds->Location->Locataire->cnib }}, Tél: {{ $finds->Location->Locataire->telephone }}, 
            reconnais avoir résilié mon contrat de location auprès de l'agence Immobilière BASSEM-YAM.
            Après avoir effectué toutes les taches qui me revenaient en charge, la somme de <strong>{{conversion($finds->restant)}}</strong>
            ({{ $finds->restant }}) Francs FCFA à été retenu pour la caution.
        </p>
        <p class="mt-2 text-center"><strong>Lu et approuvé par le locataire</strong></p>
        <div class="d-flex justify-content-between mt-5">
            <div>
                <strong>L'AGENCE</strong>
            </div>
            <div>
                <strong>{{$finds->Location->Locataire->nom}} {{$finds->Location->Locataire->prenom}}</strong>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
