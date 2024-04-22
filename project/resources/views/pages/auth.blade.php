<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.meta')
    @yield('title')
    <title>Gestion Immobilier</title>
    @yield('style')
    @include('partials.style')
</head>

<body style="background-image: url('{{ asset('images/arriere_plan.jpg') }}'); background-size: cover;">
    <div class="container-xl px-4">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <!-- Basic login form-->
                <div class="card shadow-lg border-0 rounded-lg mt-4">
                    <div class="card-header d-flex justify-content-center">
                        <div>
                            <h3 class="fw-light">AUTHENTIFICATION</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="logo" style="width: 40%">
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3 mt-1" style="background: linear-gradient(90deg, rgb(160, 240, 195) 0%, rgb(237, 237, 163) 100%); border-radius: 5px;">
                                <div class="d-flex justify-content-between p-3">
                                    <div class="ml-3 mt-2">
                                        <label for="admin">Administration</label>
                                        <input type="radio" name="role" id="admin" value="Administration" checked>
                                    </div>
                                    <div class="ml-3 mt-2">
                                        <label for="caisse">Caisse</label>
                                        <input type="radio" name="role" id="caisse" value="Caisse" >
                                    </div>
                                    <div class="ml-3 mt-2">
                                        <label for="ctl">Controle</label>
                                        <input type="radio" name="role" id="ctl" value="Controle" >
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between p-3">
                                    <div class="ml-3 mt-2">
                                        <label for="sec">Secretaire</label>
                                        <input type="radio" name="role" id="sec" value="Secretaire">
                                    </div>
                                    <div class="ml-3 mt-2">
                                        <label for="recouv">Recouvrement</label>
                                        <input type="radio" name="role" id="recouv" value="Recouvrement" >
                                    </div>
                                    <div class="ml-3 mt-2">
                                        <label for="privil">Privilege</label>
                                        <input type="radio" name="role" id="privil" value="Privilege" >
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" name="login" type="text" placeholder="Entrer votre nom d'utilisateur" />
                            </div>
                            <div class="mb-3">
                                <input class="form-control" name="password" type="password" placeholder="Entrer votre mot de passe" />
                            </div>
                            <div class="mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.script')
</body>

</html>
