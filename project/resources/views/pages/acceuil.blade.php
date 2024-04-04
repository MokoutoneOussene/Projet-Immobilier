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

        .container-fluid {
            background-image: url("images/burkina-faso.png");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .box {
            position: relative;
            background: rgba(0, 0, 0, .6);
        }
    </style>

<body class="nav-fixed">
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-6 box text-light">
                    <div class="row justify-content-center align-items-center p-lg-5" style="height: 100vh; width: 100vw;">
                        <div class="col-lg-4 col-md-12 mb-md-3">
                            <!-- Dashboard example card 1-->
                            <a class="card lift" href="{{ route('authentification') }}">
                                <div class="card-body d-flex justify-content-center flex-column">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="me-3">
                                            <h5>Caisse</h5>
                                            <div class="text-muted small">Espace reservée uniquement aux caissières</div>
                                        </div>
                                        <img src="{{asset('asset/assets/img/illustrations/browser-stats.svg')}}" alt="..." style="width: 8rem" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-12 mb-md-3">
                            <!-- Dashboard example card 1-->
                            <a class="card lift" href="{{ route('authentification') }}">
                                <div class="card-body d-flex justify-content-center flex-column">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="me-3">
                                            <h5>Controle</h5>
                                            <div class="text-muted small">Espace reservée uniquement aux agents de controle</div>
                                        </div>
                                        <img src="{{asset('asset/assets/img/illustrations/browser-stats.svg')}}" alt="..." style="width: 8rem" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-12 mb-md-3">
                            <!-- Dashboard example card 1-->
                            <a class="card lift" href="{{ route('authentification') }}">
                                <div class="card-body d-flex justify-content-center flex-column">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="me-3">
                                            <h5>Administration</h5>
                                            <div class="text-muted small">Espace reservée uniquement aux administrateurs</div>
                                        </div>
                                        <img src="{{asset('asset/assets/img/illustrations/browser-stats.svg')}}" alt="..." style="width: 8rem" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-12 mb-md-3">
                            <!-- Dashboard example card 1-->
                            <a class="card lift" href="{{ route('authentification') }}">
                                <div class="card-body d-flex justify-content-center flex-column">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="me-3">
                                            <h5>Recouvrement</h5>
                                            <div class="text-muted small">Espace reservée uniquement aux agent de recouvrement</div>
                                        </div>
                                        <img src="{{asset('asset/assets/img/illustrations/browser-stats.svg')}}" alt="..." style="width: 8rem" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-12 mb-md-3">
                            <!-- Dashboard example card 1-->
                            <a class="card lift" href="{{ route('authentification') }}">
                                <div class="card-body d-flex justify-content-center flex-column">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="me-3">
                                            <h5>Privilège</h5>
                                            <div class="text-muted small">Espace reservée uniquement aux utilisateurs privilégies</div>
                                        </div>
                                        <img src="{{asset('asset/assets/img/illustrations/browser-stats.svg')}}" alt="..." style="width: 8rem" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-12 mb-md-3">
                            <!-- Dashboard example card 1-->
                            <a class="card lift" href="{{ route('authentification') }}">
                                <div class="card-body d-flex justify-content-center flex-column">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="me-3">
                                            <h5>Secretaire</h5>
                                            <div class="text-muted small">Espace reservée uniquement aux secretaires</div>
                                        </div>
                                        <img src="{{asset('asset/assets/img/illustrations/browser-stats.svg')}}" alt="..." style="width: 8rem" />
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('partials.script')
</body>

</html>
