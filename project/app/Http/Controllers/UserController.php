<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collection = User::latest()->get();
        return view('pages.users.create', compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create($request->all());

        emotify('success', 'Locataire ajouté avec success !');
        return redirect()->route('Gestion_utilisateur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function change_password(Request $request, string $id)
    {
        $finds = User::find($id);
        $finds->update([
            'password' => Hash::make($request->password),
        ]);

        emotify('success', 'Mot de passe change avec success !');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profil_image(Request $request, string $id)
    {
        $finds = User::find($id);
        $finds->update([
            'photo' => $request->photo->store('user_profil', 'public'),
        ]);

        emotify('success', 'Photo du profile ajoutée avec success !');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = User::find($id);
        return view('pages.users.show', compact('finds'));
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
