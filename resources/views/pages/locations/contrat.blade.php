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
            <h5>Ouagadougou, le {{ date('d-m-Y') }}</h5>
        </div>
        <section class="m-3">
            <h3 class="mb-3 text-center text-decoration-underline">CONTRAT DE LOCATION N° : {{ $finds->code }}</h3>
        </section>
        <p><strong>Entre d'une part,</strong></p>
        <p class="mt-2">
            L'Agence Immobilière BASSEM-YAM au Secteur 28 représentée par El Hadji ILINGA G. Moussa, de Tél. : 25 36 50 81  / Cél.: 70 24 04 65 / 78 20 01 70 / 75 20 01 70.
        </p>
        <p><strong>Et d'autre part,</strong></p>
        <p>
            Mr, Mme, Mlle <strong>{{$finds->Locataire->nom}} {{$finds->Locataire->prenom}},</strong> Dénommé le locataire, Profession: <span class="text-wrap">{{$finds->Locataire->profession}}</span>
            adresse: <span class="text-wrap">{{$finds->Locataire->adresse}}</span> Tél: <span class="text-wrap">{{$finds->Locataire->telephone}}</span>
            Pour la location de la maison Nº <span class="text-wrap">{{$finds->Maison->code}}</span> située à <span class="text-wrap">{{$finds->Maison->adresse}}</span>
            pour un loyer mensuel de <span class="text-wrap">{{$finds->Maison->loyer}} FCFA</span> Mr ILINGA G. Moussa reconnaît avoir reçu la somme de <span class="text-wrap">{{$finds->Locataire->caution_verse}} FCFA</span>
            représentant la caution versée.
        </p>
        <p class="mt-2">
            Le paiement mensuel du loyer se fait en début du mois en cours dont le premier paiement commence à partir du mois de: {{ $finds->created_at->format('d-m-Y') }}
            et le locataire s'engage à payer son loyer paranticipation au plus tard le 03 du mois. Cher locataire, sachez que votre caution ne vous sera remboursée à la 
            sortie qu'après avoir libéré la maison, l'avoir remise en état (peinture, plomberie, etc.) telle que décrite sur la page d'état de lieu, résilier et payer vos 
            factures de la SONABEL et de I'ONEA. Dans le cas contraire, la caution servira à assurer ces frais et seul le reliquat vous sera remboursé. Toutefois la caution 
            étant insuffisante, le locataire sera redevable des sommes supplémentaires. Si en fin de contrat, cette garantie a été utilisée, et si toute ou une partie de la 
            caution doit être restituée au locataire après remise en état de la maison, elle sera remboursée à Mr. Mme, Mlle <span class="text-warning">OUEDRAOGO OUSSENI</span>
            Jusqu'à concurrence des sommes qu'elle aura versée et le reliquat sera remboursé au locataire. Veuillez à la peinture S.V.P car la réfection est obligatoire à la sortie.
        </p>
        <p class="mt-2">
            La caution n'est pas un loyer, mais une garantie de bon usage et d'entretien de la maison. Tout cumul d'arriérés de loyer déclenche automatiquement la procédure d'expulsion des lieux ou de sceller le loyer jusqu'à payement intégral de la dette. Le bris du scellé constitue un motif valable d'expulsion immédiate du locataire, la somme dû restant à sa charge. Pour éviter ce désagrément tout locataire est invité au respect du délai de paiement ou d'informer le responsable de l'Agence à temps de tout imprévu empêchant d'honorer à cet engagement. Prenez librement vos décisions avant de signer le présent contrat car toute somme versée est remis sans délai au bailleur. En cas de changement d'avis, vous avez 48 heures pour annuler votre contrat auprès de l'agence. Passez ce délai, un (01) mois de loyer sera déduit de votre caution car les maisons confiées à l'agence sont à titre commercial et ne doivent pas rester inoccupées.
        </p>
        <p class="mt-2">
            Résiliation. Le locataire peut demander la résiliation de ce contrat avec un mois de préavis. La date de remise des clés est fixée le 01 du mois suivant pour permettre à votre remplaçant d'accéder à la maison, faute de quoi le mois entier sera dû. L'agence peut résilier ce contrat avec un préavis de (03) trois mois. Le remboursement de la caution sera effectué dans les mêmes conditions.
        </p>
        <p class="text-center">
            Une copie de votre CNIB doit être jointe à la présente, Lu et approuvé bon pour accord
        </p>
        <div class="row mt-5">
            <div class="col-4">
                <h4>L'Agence </h4>
            </div>
            <div class="col-4">
                <h4>Le Locataire</h4>
            </div>
            <div class="col-4">
                <h4>Le Garant</h4>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
