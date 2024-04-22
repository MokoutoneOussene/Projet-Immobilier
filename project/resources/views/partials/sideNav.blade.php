<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Pages</div>
                    <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        Tableau de bord
                    </a>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError1" aria-expanded="false" aria-controls="pagesCollapseError">
                        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                        FORMALITES
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError1" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('Gestion_locataires.index') }}">Gestion locataires</a>
                            @if (Auth::user()->role == 'Privilege' || Auth::user()->role == 'Secretaire' || Auth::user()->role == 'Caisse')
                                <a class="nav-link" href="{{ route('Gestion_location.index') }}">Gestion de locations</a>
                            @endif
                            @if (Auth::user()->role == 'Privilege' || Auth::user()->role == 'Secretaire')
                                <a class="nav-link" href="{{ route('liste_resiliation') }}">Contrats resilié</a>
                            @endif
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError2" aria-expanded="false" aria-controls="pagesCollapseError">
                        <div class="nav-link-icon"><i data-feather="package"></i></div>
                        ENCAISSEMENTS
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError2" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            @if (Auth::user()->role == 'Privilege' || Auth::user()->role == 'Secretaire' || Auth::user()->role == 'Administration' || Auth::user()->role == 'Caisse')
                                <a class="nav-link" href="{{ route('Gestion_encaissements.index') }}">Gerer encaissements</a>
                            @endif
                            <a class="nav-link" href="{{ route('etat_general') }}">Etat général</a>
                        </nav>
                    </div>
                    @if (Auth::user()->role == 'Privilege' || Auth::user()->role == 'Secretaire' || Auth::user()->role == 'Administration' || Auth::user()->role == 'Caisse')   
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseErrorST" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                            DEPENSES
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseErrorST" data-bs-parent="#accordionSidenavPagesMenu">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('Gestion_depense_courant.index') }}">Dépenses
                                    courante</a>
                                <a class="nav-link" href="{{ route('depense_bailleur') }}">Dépenses bailleur</a>
                                <a class="nav-link" href="{{ route('depense_locataire') }}">Dépenses locataire</a>
                                <a class="nav-link" href="">Etat des dépenses</a>
                            </nav>
                        </div>
                    @endif

                    @if (Auth::user()->role == 'Privilege' || Auth::user()->role == 'Secretaire')
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages3" aria-expanded="false" aria-controls="collapsePages">
                            <div class="nav-link-icon"><i data-feather="grid"></i></div>
                            LOYERS
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages3" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <!-- Nested Sidenav Accordion (Pages -> Account)-->
                                <a class="nav-link collapsed" href="{{ route('Gestion_immeuble.index') }}">Gestion
                                    Immeubles</a>
                                <a class="nav-link collapsed" href="{{ route('Gestion_maisons.index') }}">Gestion
                                    maisons</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages34" aria-expanded="false" aria-controls="collapsePages">
                            <div class="nav-link-icon"><i data-feather="users"></i></div>
                            BAILLEURS
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages34" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <!-- Nested Sidenav Accordion (Pages -> Account)-->
                                <a class="nav-link collapsed" href="{{ route('Gestion_bailleurs.index') }}">Liste des
                                    bailleurs</a>
                                <a class="nav-link collapsed"
                                    href="{{ route('Gestion_contrat_bailleur.index') }}">Contrats bailleur</a>
                                <a class="nav-link collapsed" href="#!">Retraits bailleur</a>
                            </nav>
                        </div>
                    @endif

                    @if (Auth::user()->role == 'Privilege')
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages345" aria-expanded="false" aria-controls="collapsePages">
                            <div class="nav-link-icon"><i data-feather="users"></i></div>
                            Administration
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages345" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <!-- Nested Sidenav Accordion (Pages -> Account)-->
                                <a class="nav-link collapsed" href="{{ route('Gestion_paiements.index') }}">
                                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                                    Gestions des salaires
                                </a>
                                <a class="nav-link collapsed" href="{{ route('Gestion_utilisateur.create') }}">
                                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                                    Créer un compte
                                </a>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
            <img class="text-center" src="{{ asset('images/logo.png') }}" alt="logo" width="150px"
                style="margin: auto">
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Utilisateur connecté(e):</div>
                    <div class="sidenav-footer-title">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</div>
                    <h6 class="text-center text-primary">Role : {{ Auth::user()->role }}</h6>
                </div>
            </div>
        </nav>
    </div>
