<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Encaissement;
use App\Models\Locataire;
use App\Models\Location;
use App\Models\Maison;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.acceuil');
    }

    /**
     * Display a listing of the resource.
     */
    public function authentification()
    {
        return view('pages.auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $current_date = date('Y/m/d');
        $locataires = Locataire::all();
        $locat_contrat = Location::where('situation', 'En cours')->get();
        $maisons_libre = Maison::where('situation', '=', 'libre')->get();
        $maisons_all = Maison::all();
        $encaissements = Encaissement::where('date_encaissement', '=', $current_date)->get();
        $total = $encaissements->sum('montant');
        return view('pages.dashboard', compact('locataires', 'locat_contrat', 'maisons_libre', 'maisons_all', 'encaissements', 'total'));
    }
}
