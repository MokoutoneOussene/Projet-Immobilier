<?php

namespace App\Providers;

use App\Models\Bailleur;
use App\Models\ContratBailleur;
use App\Models\Depense;
use App\Models\DepenseBailleur;
use App\Models\DepenseLocataire;
use App\Models\Encaissement;
use App\Models\Immeuble;
use App\Models\Locataire;
use App\Models\Location;
use App\Models\Maison;
use App\Models\Paiement;
use App\Models\Resiliation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Locataire::created(function ($locat) {
            $locat->update(['code' => 'LT-' . $locat->id]);
        });

        Bailleur::created(function ($baill) {
            $baill->update(['code' => 'BA-' . $baill->id]);
        });

        Immeuble::created(function ($immeub) {
            $immeub->update(['code' => 'IM-' . $immeub->id]);
        });

        Maison::created(function ($maison) {
            $maison->update(['code' => $maison->Immeuble->code. '.' . $maison->id]);
        });

        User::created(function ($users) {
            $users->update(['code' => 'U-' . $users->id]);
            $users->update(['login' => $users->nom. '.' . $users->prenom]);
            $users->update(['password' => Hash::make('password')]);
        });

        Location::created(function ($locations) {
            $locations->update(['code' => 'LC-' . $locations->id]);
        });

        Encaissement::created(function ($encaiss) {
            $encaiss->update(['code' => 'EC-' . $encaiss->id]);
        });

        ContratBailleur::created(function ($contrat_b) {
            $contrat_b->update(['code' => 'CBY-' . $contrat_b->id]);
            $contrat_b->update(['situation' => 'En cours']);
        });

        Depense::created(function ($dep_courant) {
            $dep_courant->update(['code' => 'DCR-' . $dep_courant->id]);
        });

        DepenseBailleur::created(function ($dep_bailleur) {
            $dep_bailleur->update(['code' => 'DBY-' . $dep_bailleur->id]);
        });

        DepenseLocataire::created(function ($dep_locataire) {
            $dep_locataire->update(['code' => 'DLT-' . $dep_locataire->id]);
        });

        Paiement::created(function ($paiement) {
            $paiement->update(['code' => 'PAI-' . $paiement->id]);
            $paiement->update(['total' => $paiement->montant+$paiement->bonus]);
        });

        Resiliation::created(function ($reste) {
            $reste->update(['restant' => $reste->Location->Locataire->caution_verse - $reste->last_mois - $reste->refec_peinture - $reste->refec_plomberie - $reste->trav_electricite - $reste->redev_sonabel - $reste->facture_onea]);
        });
    }
}