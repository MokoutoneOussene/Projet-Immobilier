<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Locataire;
use App\Models\Location;
use App\Models\Maison;
use App\Models\Resiliation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Location::where('situation', 'En cours')->get();
        $locataires = Locataire::where('statut', '=', 'En attente')->get();
        $maisons = Maison::where('situation', '=', 'Libre')->get();
        return view('pages.locations.location', compact('locataires', 'maisons', 'collection'));
    }

    /**
     * Display a listing of the resource.
     */
    public function liste_resiliation()
    {
        $collection = Resiliation::latest()->get();
        return view('pages.locations.liste_resiliation', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collection = Location::latest()->get();
        $locataires = Locataire::where('statut', '=', 'En attente')->get();
        $maisons = Maison::where('situation', '=', 'Libre')->get();
        return view('pages.locations.create', compact('locataires', 'maisons', 'collection'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $locat = Location::create($request->all());

        $locataires = Locataire::find($locat->Locataire->id);
        $maisons = Maison::find($locat->Maison->id);

        $locataires->update(['statut' => 'Sous contrat']);
        $maisons->update(['situation' => 'Occupée']);

        emotify('success', 'Location ajoutée avec success !');
        return redirect()->route('Gestion_location.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function resiliation_locat(Request $request)
    {
        $resil = Resiliation::create($request->all());

        $location = Location::find($resil->Location->id);
        $maisons = Maison::find($resil->Location->Maison->id);

        $location->update(['situation' => 'resilie']);
        $maisons->update(['situation' => 'Libre']);

        emotify('error', 'Contrat de location resilié avec success !');
        return redirect()->route('liste_resiliation');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Location::find($id);
        return view('pages.locations.show', compact('finds'));
    }

    /**
     * Display the specified resource.
     */
    public function show_resiliation(string $id)
    {
        $finds = Resiliation::find($id);
        return view('pages.locations.show_resiliation', compact('finds'));
    }

    /**
     * Display the specified resource.
     */
    public function print_resiliation(string $id)
    {
        $finds = Resiliation::find($id);
        return view('pages.locations.print_resiliation', compact('finds'));
    }

    /**
     * Display the specified resource.
     */
    public function form_resiliation(string $id)
    {
        $finds = Location::find($id);
        return view('pages.locations.resiliation_contrat', compact('finds'));
    }

    /**
     * Display the specified resource.
     */
    public function encaiss_locat(string $id)
    {
        $current_date = Carbon::now();
        $finds = Location::find($id);
        return view('pages.locations.encaissement_location', compact('finds', 'current_date'));
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
