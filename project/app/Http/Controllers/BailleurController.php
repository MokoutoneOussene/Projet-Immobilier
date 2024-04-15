<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bailleur;
use App\Models\ContratBailleur;
use App\Models\Immeuble;
use Illuminate\Http\Request;

class BailleurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Bailleur::latest()->get();

        return view('pages.bailleurs.bailleur', compact('collection'));
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
        Bailleur::create($request->all());

        emotify('success', 'Le bailleur a été ajouté avec success !');
        return redirect()->route('Gestion_bailleurs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Bailleur::find($id);
        $contrat_bailleur = ContratBailleur::where('bailleurs_id', '=', $id)->get();

        $immeubles = Immeuble::latest()->with('maisons.location')->whereIn('bailleurs_id', $finds)->get();

        $immeubles->each(function ($immeuble) {
            $immeuble->maisons->load('location.Encaissement');
        });

        $immeubles->each(function ($immeuble) {
            $totalEncaissement = 0;
            foreach ($immeuble->maisons as $maison) {
                if ($maison->location && $maison->location->Encaissement) {
                    $totalEncaissement += $maison->location->Encaissement->montant;
                }
            }
            $immeuble->totalEncaissement = $totalEncaissement;
        });

        return view('pages.bailleurs.show', compact('finds', 'contrat_bailleur', 'immeubles'));
    }

    /**
     * Display the specified resource.
     */
    public function contrat_bailleur(string $id)
    {
        $finds = ContratBailleur::find($id);

        return view('pages.bailleurs.contrat', compact('finds'));
    }

    /**
     * Display the specified resource.
     */
    public function addContrat_bailleur(string $id)
    {
        $finds = Bailleur::find($id);
        $immeubles = Immeuble::where('bailleurs_id', '=', $id)->get();

        return view('pages.bailleurs.create_contrat', compact('finds', 'immeubles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $finds = Bailleur::find($id);

        return view('pages.bailleurs.edit', compact('finds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proprio = Bailleur::find($id);
        $proprio->update($request->all());

        emotify('success', 'Proprietaire modifié avec success !');
        return redirect()->route('Gestion_bailleurs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proprio = Bailleur::find($id);
        $proprio->delete();

        emotify('error', ' Bailleur supprimer avec success !');
        return redirect()->route('Gestion_bailleurs.index');
    }
}
