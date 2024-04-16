<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Locataire;
use App\Models\Location;
use App\Models\Maison;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Location::latest()->get();
        $locataires = Locataire::where('statut', '=', 'En attente')->get();
        $maisons = Maison::where('situation', '=', 'Libre')->get();
        return view('pages.locations.location', compact('locataires', 'maisons', 'collection'));
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
    public function encaiss_locat(string $id)
    {
        $finds = Location::find($id);
        return view('pages.locations.encaissement_location', compact('finds'));
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
