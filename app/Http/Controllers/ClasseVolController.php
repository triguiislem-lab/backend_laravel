<?php

namespace App\Http\Controllers;

use App\Models\ClasseVol;
use Illuminate\Http\Request;

class ClasseVolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $classeVols = ClasseVol::all();
            return response()->json($classeVols);
        } catch (\Exception $e) {
            return response()->json(
                "probleme de récupération de la liste des classes de vol"
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $classeVol = new ClasseVol([
                "Nom_classe" => $request->input("Nom_classe"),
                "description_classe" => $request->input("description_classe"),
            ]);

            $classeVol->save();

            return response()->json($classeVol);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $classeVol = ClasseVol::findOrFail($id)->get();
            return response()->json($classeVol);
        } catch (\Exception $e) {
            return response()->json("classe de vol non trouvé");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $classeVol = ClasseVol::findOrFail($id);
            $classeVol->update($request->all());
            return response()->json($classeVol);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $classeVol = ClasseVol::findOrFail($id);
            $classeVol->delete();
            return response()->json("classe de vol supprimé");
        } catch (\Exception $e) {
            return response()->json(
                "probleme de suppression de la classe de vol"
            );
        }
    }
}
