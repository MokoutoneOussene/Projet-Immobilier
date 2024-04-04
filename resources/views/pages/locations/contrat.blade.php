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
                    <p>L'Immobilier qui rassure !</p>
                </div>
                <div class="col-9">
                    <h1 class="text-center p-2" style="font-size: 25px;">
                        <strong>AGENCE IMMOBILIER BASSEM-YAM</strong>
                    </h1>
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
        <section class="m-5">
            <h3 class="mb-3">Contrat N° : {{ $finds->code }}</h3>
            {{-- <h4>Doit : {{ $finds->Locataire->nom }} {{ $finds->Locataire->prenom }}</h4> --}}
        </section>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
