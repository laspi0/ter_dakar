<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere;

class MatiereController extends Controller
{
    public function index()
    {
        $matieres = Matiere::all();
        return view('matieres.index', compact('matieres'));
    }

    public function create()
    {
        return view('matieres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Matiere::create($request->all());

        return redirect()->route('matieres.index')->with('success', 'Matière créée avec succès.');
    }

    public function show($id)
    {
        $matiere = Matiere::findOrFail($id);
        return view('matieres.show', compact('matiere'));
    }

    public function edit($id)
    {
        $matiere = Matiere::findOrFail($id);
        return view('matieres.edit', compact('matiere'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $matiere = Matiere::findOrFail($id);
        $matiere->update($request->all());

        return redirect()->route('matieres.index')->with('success', 'Matière mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $matiere = Matiere::findOrFail($id);
        $matiere->delete();

        return redirect()->route('matieres.index')->with('success', 'Matière supprimée avec succès.');
    }
}
