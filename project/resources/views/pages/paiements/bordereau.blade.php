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
        <div class="d-flex justify-content-end mb-4">
            <h5>Ouagadougou, le {{ $finds->date }}</h5>
        </div>

        <div class="text-center">
            <h1 class="text-decoration-underline"><strong>CONTRAT DE GESTION IMMOBILIERE</strong></h1>
        </div>
        <h5 class="m-3">Contrat N°: <strong>{{ $finds->id }}</strong></h5>
        <p><strong>Entre</strong></p>
        <p><strong>D'une part,</strong></p>
        <p>
            L'Agence BASSEM-YAM 06 BP 10812 Ouaga 06 Burkina Faso, Tél. : (226) 25 36 50 81 / 70 24 04 65 / 78 20 01 70,
            représentée par Mr ILINGA G. Moïse titulaire de la Carte d'Identité Burkinabé
            N°B9821711 du 06/11/2017 délivrée à Ouagadougou par l'Office National d'Identification
            (ONI) Ouagadougou, dénommé le gestionnaire,
        </p>
        <p class="mt-3"><strong>D'autre part,</strong></p>
        <p>
            {{ $finds->Bailleur->nom }} {{ $finds->Bailleur->prenom }}, née le {{ $finds->Bailleur->date_naissance }} à {{ $finds->Bailleur->lieu }}, {{ $finds->Bailleur->profession }},
            demeurant à {{ $finds->Bailleur->quartier }}, titulaire de la CNIB N°{{ $finds->Bailleur->cnib }} délivrée
            le {{ $finds->Bailleur->date_deliv }} par l'Office Nationale d'Identification (ONI).
        </p>
        <p>{{ $finds->Bailleur->telephone }}, dénommé le bailleur.</p>
        <p class="mt-3"><strong>Représentante :</strong></p>
        <p>
            {{ $finds->Bailleur->prevent_name }}
        </p>
        <p>Tel : {{ $finds->Bailleur->prevent_phone }}</p>

        <p>Il a été convenu et arrêté ce qui suit :</p>
        <p class="mt-3"><strong>OBJET :</strong></p>
        <p>
            <strong class="text-decoration-underline">Article 1 :</strong> Le bailleur accepte de confier sa maison (Villa) en gestion locative
            à l'Agence Immobilière BASSEM -YAM, représentée par son gestionnaire.
        </p>
        <p>
            <strong class="text-decoration-underline">Article 2 :</strong> Le gestionnaire a tout pouvoir de signer le présent contrat au nom de
            l'Agence Immobilière BASSEM - YAM.
        </p>
        <p class="mt-3"><strong>GESTION :</strong></p>
        <p>
            <strong class="text-decoration-underline">Article 3 :</strong> Un dossier est ouvert une fois le présent contrat signé et les frais
            de dossier s'élèvent à dix mille (10 000) Francs CFA.
        </p>
        <p>
            <strong class="text-decoration-underline">Article 4 :</strong> Une somme forfaitaire de 10%
            du montant des frais de loyer est retenue par le gestionnaire au titre des prestations
            de services. Toutefois, une somme de mille (1 000) Francs CFA est également retenue
            au cas où il y a un déplacement en banque pour des opérations financières.
        </p>
        <p>
            <strong class="text-decoration-underline">Article 5 :</strong> Le bailleur reconnaît ici
            avoir confié en gestion locative à l'Agence les biens immobiliers tels que décrits à
            l’article 8 du présent contrat.
        </p>
        <p>A ce titre le bailleur :</p>
        <p class="ml-4">
            - Engage l'agence de toutes responsabilités judiciaires et pécuniaires concernant le droit
            de location et / ou l'autorisation de location ;
        </p>
        <p class="ml-4">
            - Reconnaît l'agence comme seul interlocuteur de tout locataire éventuel ;
        </p>
        <p class="ml-4">
            - Cependant, les vidanges des fosses septiques de même que les travaux liés à
            l'étanchéité, aux fuites de plomberie sanitaire et d'électricité, restent à la
            charge du bailleur qui en est informé à l'avance.
        </p>
        <p>
            <strong class="text-decoration-underline">Article 6 :</strong> Le gestionnaire accepte les
            biens immobiliers tels que décrits à l'article 8 du présent contrat et s'engage, à
            en assurer la gestion locative.
        </p>
        <p>A ce titre, l'agence :</p>
        <p class="ml-4">
            - Aura la charge de toute perception de loyer au nom et pour le compte du bailleur ;
        </p>
        <p class="ml-4">
            - Versera le 10 de chaque mois dans le compte Coris Bank N°01008 44762125401-62
            pour le compte du bailleur ou à son représentant une somme équivalente au montant
            des loyers déduction faite des 10% au titre des prestations de services et ce pour
            chaque maison occupée par un locataire.
        </p>
        <p>
            <strong class="text-decoration-underline">Article 7 :</strong> Les biens loués
            doivent être entretenus en bon père de famille par les locataires sans porter
            préjudice aux gros œuvres ni atteinte aux bonnes mœurs. Tous travaux, modifications
            de gros œuvres ou constructions additives ne seront faits qu'après autorisation du
            bailleur qui en recevra la demande écrite par l'agence immobilière et signée du locataire.
        </p>
        <p>
            <strong class="text-decoration-underline">Article 8 :</strong> Les biens confiés en
            gestion locative à l'agence immobilière sont les suivants :
        </p>
        <p class="ml-4">
            - Informations géographiques: Parcelle 10, Lot 09, Section 16, Superficie 240m' ;
            Saaba ; Commune Rurale de Saaba ;
        </p>
        <p class="ml-4">
            - Descriptions des biens :
        </p>
        <p>
            Une villa située à Saaba comprenant : trois chambres carrelées et vitrées, un
            salon, une cuisine interne avec évier, deux douches, deux lavabos, deux miroirs de
            toilette, cinq ventilateurs plafonniers, des portes iso planes, grille de protection,
            une installation d'eau et d'électricité.
        </p>
        <p>
            Une toilette extérieure. Un garage couvert. Saaba ;
        </p>
        <p>
            <strong class="text-decoration-underline">Article 9 :</strong> La durée du contrat est d'un (01) an renouvelable à compter du 01 Avril 2024.
        </p>
        <p>
            Ce contrat est d'une validité d'un (1) an, renouvelable par tacite reconduction, sauf dénonciation de l'une des parties, au moins trois (3) mois avant la date d'expiration.
        </p>
        <p>
            <strong class="text-decoration-underline">Article 10 :</strong> Tout manquement au présent contrat par l'une des deux parties peut entrainer la résiliation par anticipation du contrat. Toute résiliation d'un locataire sera communiquée au bailleur par l'agence immobilière dès que celle-ci en aura reçu l'information.
        </p>
        <div class="m-4 d-flex justify-content-end">
            <p>Fait à Ouagadougou, le {{ $finds->date }}</p>
        </div>

        <div class="row d-flex justify-content-between">
            <div class="col-6 text-center">
                <div class="mb-5">
                    <p>L'agence, Le gestionnaire</p>
                </div>
                <div class="mb-5">
                    <h3>
                        <strong class="text-decoration-underline">ILINGA G. Moïse</strong>
                    </h3>
                </div>
            </div>
            <div class="col-6 text-center">
                <div class="mb-5">
                    <p>Le Bailleur</p>
                </div>
                <div class="mb-5">
                    <h3>
                        <strong class="text-decoration-underline">{{ $finds->Bailleur->nom }}</strong>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
