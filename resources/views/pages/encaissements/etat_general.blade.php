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

<body class="nav-fixed">
    <div class="container-fluid mt-1">
        <div class="row mt-3">
            <div class="col-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="text-center mb-3">Etat général des paiement</h2>
                        <table class="table table-bordered table-responsive">
                            @foreach ($immeubles as $immeuble)
                                <tr>
                                    <th>{{ $immeuble->Bailleur->nom }} {{ $immeuble->Bailleur->prenom }}</th>
                                    <td>
                                <tr class="text-center">
                                    <th></th>
                                    <th>Code</th>
                                    <th>Nom locataire</th>
                                    <th>Num téléphone</th>
                                    <th>Loyer</th>
                                    <th>Dernier mois</th>
                                    <th>Année</th>
                                    <th>Retard</th>
                                </tr>
                                @foreach ($immeuble->maisons as $item)
                                    <tr class="text-center">
                                        <td></td>
                                        <td>{{ $item->location->Encaissement->code ?? '' }}</td>
                                        <td>
                                            {{ $item->location->Encaissement->Location->Locataire->nom ?? '' }}
                                            {{ $item->location->Encaissement->Location->Locataire->prenom ?? '' }}
                                        </td>
                                        <td>{{ $item->location->Encaissement->Location->Locataire->telephone ?? '' }}
                                        </td>
                                        <td>{{ $item->location->Encaissement->Location->Maison->loyer ?? '' }}</td>
                                        <td>{{ $item->location->Encaissement->periode ?? '' }}</td>
                                        <td>{{ $item->location->Encaissement->annee ?? '' }}</td>
                                        <td>0 Mois</td>
                                    </tr>
                                @endforeach
                                </td>
                                <td colspan="8">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-6 p-3 bg-dark">
                                            <h4 class="text-light"><strong>TOTAL</strong></h4>
                                        </div>
                                        <div class="col-lg-3 col-md-6 p-3 bg-danger">
                                            <h4 class="text-light"><strong>{{ $immeuble->totalEncaissement }}
                                                    FCFA</strong></h4>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
