<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bailleur;
use App\Models\ContratBailleur;
use App\Models\Immeuble;
use Illuminate\Http\Request;

class ContratBailleurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contrat_bailleurs = ContratBailleur::latest()->get();
        $bailleurs = Bailleur::latest()->get();
        $immeubles = Immeuble::latest()->get();

        return view('pages.contrat_bailleur.contrat', compact('contrat_bailleurs', 'bailleurs', 'immeubles'));
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
        $cbay = ContratBailleur::create($request->all());
        $contrats = Bailleur::find($cbay->Bailleur->id);

        $contrats->update(['situation' => 'Sous contrat']);

        emotify('success', 'Contrat bailleur ajouté avec success !');
        return redirect()->route('Gestion_contrat_bailleur.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = ContratBailleur::find($id);

        return view('pages.contrat_bailleur.show', compact('finds'));
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
