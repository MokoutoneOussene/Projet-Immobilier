<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BailleurController;
use App\Http\Controllers\ContratBailleurController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\EncaissementController;
use App\Http\Controllers\ImmeubleController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaisonController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'authentification'])->name('authentification');
Route::post('Authentification', [AuthController::class, 'login'])->name('login');
Route::post('deconnexion', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('Dashboard/home', [PageController::class, 'dashboard'])->name('dashboard');

    Route::resource('Gestion_utilisateur', UserController::class);
    Route::post('change_password/{id}', [UserController::class, 'change_password']);
    Route::post('add_profil_image/{id}', [UserController::class, 'profil_image']);

    Route::resource('Gestion_locataires', LocataireController::class);
    Route::get('Contrat/gestion_contrat/{id}', [LocataireController::class, 'contrat']);
    Route::get('delete_locataire/{id}', [LocataireController::class, 'destroy']);

    Route::resource('Gestion_bailleurs', BailleurController::class);
    Route::get('Contrat/contrat_bailleur/{id}', [BailleurController::class, 'contrat_bailleur']);
    Route::get('delete_bailleur/{id}', [BailleurController::class, 'destroy']);
    Route::get('addContrat_bailleur/{id}', [BailleurController::class, 'addContrat_bailleur']);

    Route::resource('Gestion_immeuble', ImmeubleController::class);
    Route::get('delete_immeubles/{id}', [ImmeubleController::class, 'destroy']);
    
    Route::resource('Gestion_location', LocationController::class);
    Route::get('encaissement_locations/{id}', [LocationController::class, 'encaiss_locat']);
    Route::get('form_resiliation/{id}', [LocationController::class, 'form_resiliation']);
    Route::post('resiliation_locations', [LocationController::class, 'resiliation_locat'])->name('resiliation');
    Route::get('Liste_resiliation', [LocationController::class, 'liste_resiliation'])->name('liste_resiliation');
    Route::get('show_resiliation/{id}', [LocationController::class, 'show_resiliation']);
    Route::get('print_resiliation/{id}', [LocationController::class, 'print_resiliation']);

    Route::resource('Gestion_maisons', MaisonController::class);
    Route::get('Maison/maison_libre', [MaisonController::class, 'maison_libre'])->name('maison_libre');
    Route::get('delete_maison/{id}', [MaisonController::class, 'destroy']);

    Route::resource('Gestion_encaissements', EncaissementController::class);
    Route::get('Filter/date_filter', [EncaissementController::class, 'date_filter'])->name('date_filter');
    Route::get('Impression/print_encaissement/{id}', [EncaissementController::class, 'print']);
    Route::get('Etat-general/encaissement', [EncaissementController::class, 'etat_general'])->name('etat_general');
    Route::get('delete_encaissement/{id}', [EncaissementController::class, 'destroy']);

    Route::resource('Gestion_contrat_bailleur', ContratBailleurController::class);

    Route::resource('Gestion_depense_courant', DepenseController::class);
    Route::get('Depense/depense_bailleur', [DepenseController::class, 'depense_bailleur'])->name('depense_bailleur');
    Route::get('Depense/depense_locataire', [DepenseController::class, 'depense_locataire'])->name('depense_locataire');
    Route::post('Depense/depense_bailleur_storage', [DepenseController::class, 'store_depense_bailleur'])->name('store_depense_bailleur');
    Route::post('Depense/depense_locataire_storage', [DepenseController::class, 'store_depense_locataire'])->name('store_depense_locataire');
    Route::get('Filter/depenses_date_filter', [DepenseController::class, 'date_filter'])->name('depense_date_filter');
    Route::get('Filter/filter_dep_bailleur', [DepenseController::class, 'filter_dep_bailleur'])->name('filter_dep_bailleur');
    Route::get('Filter/filter_dep_locat', [DepenseController::class, 'filter_dep_locat'])->name('filter_dep_locat');
    Route::get('delete_dep_courant/{id}', [DepenseController::class, 'destroy_courant']);
    Route::get('delete_dep_bailleur/{id}', [DepenseController::class, 'destroy_bailleur']);
    Route::get('delete_dep_locataire/{id}', [DepenseController::class, 'destroy_locataire']);

    Route::resource('Gestion_paiements', PaiementController::class);
    Route::get('Filter/date_filter_paiement', [PaiementController::class, 'date_filter'])->name('date_filter_paiement');
});
