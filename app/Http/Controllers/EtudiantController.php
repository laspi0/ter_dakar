<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }

    public function create()
    {
        return view('etudiants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'matricule' => 'required|unique:etudiants',
        ]);

        Etudiant::create($request->all());
        return redirect()->route('etudiants.index')
            ->with('success', 'Etudiant créé avec succès.');
    }

    public function show(string $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.show', compact('etudiant'));
    }

    public function edit(Etudiant $etudiant)
    {
        return view('etudiants.edit', compact('etudiant'));
    }

    public function update(Request $request, string $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'matricule' => 'required|unique:etudiants,matricule,' . $etudiant->id,
        ]);

        $etudiant->update($request->all());
        return redirect()->route('etudiants.index')
            ->with('success', 'Etudiant mis à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();
        return redirect()->route('etudiants.index')
            ->with('success', 'Etudiant supprimé avec succès.');
    }
}
