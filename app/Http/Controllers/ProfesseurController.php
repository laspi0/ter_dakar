<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    public function index()
    {
        $professeurs = Professeur::all();
        return view('professeurs.index', compact('professeurs'));
    }

    public function create()
    {
        return view('professeurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'UE' => 'required',
        ]);

        Professeur::create($request->all());
        return redirect()->route('professeurs.index')
            ->with('success', 'Professeur créé avec succès.');
    }

    public function show(string $id)
    {
        $professeur = Professeur::findOrFail($id);
        return view('professeurs.show', compact('professeur'));
    }

    public function edit(string $id)
    {
        $professeur = Professeur::findOrFail($id);
        return view('professeurs.edit', compact('professeur'));
    }

    public function update(Request $request, string $id)
    {
        $professeur = Professeur::findOrFail($id);
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'UE' => 'required',
        ]);

        $professeur->update($request->all());
        return redirect()->route('professeurs.index')
            ->with('success', 'Professeur mis à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $professeur = Professeur::findOrFail($id);
        $professeur->delete();
        return redirect()->route('professeurs.index')
            ->with('success', 'Professeur supprimé avec succès.');
    }
}