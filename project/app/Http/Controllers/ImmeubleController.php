<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bailleur;
use App\Models\Immeuble;
use App\Models\Maison;
use Illuminate\Http\Request;

class ImmeubleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Immeuble::latest()->get();
        $bailleurs = Bailleur::latest()->get();
        return view('pages.immeubles.immeuble', compact('collection', 'bailleurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bailleurs = Bailleur::latest()->get();
        return view('pages.immeubles.create', compact('bailleurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Immeuble::create($request->all());

        emotify('success', ' Immeuble ajouté avec success !');
        return redirect()->route('Gestion_immeuble.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Immeuble::find($id);
        $maisons = Maison::where('immeubles_id', '=', $id)->get();
        $total = $maisons->sum('loyer');

        return view('pages.immeubles.show', compact('finds', 'maisons', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $finds = Immeuble::find($id);
        $bailleurs = Bailleur::all();
        return view('pages.immeubles.edit', compact('finds', 'bailleurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $immeub = Immeuble::find($id);
        $immeub->update($request->all());

        emotify('success', 'Immeuble modifié avec success !');
        return redirect()->route('Gestion_immeuble.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $immeub = Immeuble::find($id);
        $immeub->delete();

        emotify('error', ' Immeuble supprimer avec success !');
        return redirect()->route('Gestion_immeuble.index');
    }
}
