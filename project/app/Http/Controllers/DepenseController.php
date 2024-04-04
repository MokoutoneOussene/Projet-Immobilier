<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bailleur;
use App\Models\Depense;
use App\Models\DepenseBailleur;
use App\Models\DepenseLocataire;
use App\Models\Locataire;
use App\Models\User;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depenses = Depense::latest()->get();

        $total = $depenses->sum('montant');
        return view('pages.depenses.depense_courant', compact('depenses', 'total'));
    }

    /**
     * Display a listing of the resource.
     */
    public function depense_bailleur()
    {
        $depenses = DepenseBailleur::latest()->get();
        $bailleurs = Bailleur::where('situation', 'Sous contrat')->get();

        $total = $depenses->sum('montant');
        return view('pages.depenses.depense_bailleur', compact('depenses', 'total', 'bailleurs'));
    }

    /**
     * Display a listing of the resource.
     */
    public function depense_locataire()
    {
        $depenses = DepenseLocataire::latest()->get();
        $locataires = Locataire::where('statut', 'Sous contrat')->get();

        $total = $depenses->sum('montant');
        return view('pages.depenses.depense_locataire', compact('depenses', 'total', 'locataires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function date_filter(Request $request)
    {
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;

        $depenses = Depense::whereDate('date', '>=', $date_debut)->whereDate('date', '<=', $date_fin)->get();
        $total = $depenses->sum('montant');

        return view('pages.depenses.depense_courant', compact('depenses', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filter_dep_bailleur(Request $request)
    {
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;

        $depenses = DepenseBailleur::whereDate('date', '>=', $date_debut)->whereDate('date', '<=', $date_fin)->get();
        $bailleurs = Bailleur::latest()->get();
        $total = $depenses->sum('montant');

        return view('pages.depenses.depense_bailleur', compact('depenses', 'total', 'bailleurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filter_dep_locat(Request $request)
    {
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;

        $depenses = DepenseLocataire::whereDate('date', '>=', $date_debut)->whereDate('date', '<=', $date_fin)->get();
        $locataires = Locataire::latest()->get();
        $total = $depenses->sum('montant');

        return view('pages.depenses.depense_locataire', compact('depenses', 'total', 'locataires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Depense::create($request->all());

        emotify('success', ' Dépense courante ajoutée avec success !');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_depense_bailleur(Request $request)
    {
        DepenseBailleur::create($request->all());

        emotify('success', ' Dépense bailleur ajoutée avec success !');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_depense_locataire(Request $request)
    {
        DepenseLocataire::create($request->all());

        emotify('success', ' Dépense locataire ajoutée avec success !');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
