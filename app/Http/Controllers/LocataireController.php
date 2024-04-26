<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Encaissement;
use App\Models\Locataire;
use App\Models\Location;
use Illuminate\Http\Request;

class LocataireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Locataire::latest()->get();
        return view('pages.locataires.locataire', compact('collection'));
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
        Locataire::create($request->all());

        emotify('success', 'Locataire ajouté avec success !');
        return redirect()->route('Gestion_locataires.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Locataire::find($id);
        $locations = Location::where('locataires_id', '=', $finds->id)->get('id');

        $collection = Encaissement::whereIn('locations_id', $locations)->get();
        $total = $collection->sum('montant');
        // dd($collection);
        return view('pages.locataires.show', compact('finds', 'collection', 'total'));
    }

    /**
     * Display the specified resource.
     */
    public function contrat(string $id)
    {
        $finds = Location::find($id);

        return view('pages.locations.contrat', compact('finds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $finds = Locataire::find($id);

        return view('pages.locataires.edit', compact('finds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $locat = Locataire::find($id);
        $locat->update($request->all());

        emotify('success', 'Locataire modifié avec success !');
        return redirect()->route('Gestion_locataires.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $locat = Locataire::find($id);
        $locat->delete();

        emotify('error', ' Locataire supprimer avec success !');
        return redirect()->route('Gestion_locataires.index');
    }
}
